<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Student;
use App\Telephone;
use App\Classe;
use App\Hobbie;
use Validator;
use Storage;
use Session;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index',
            'show',
            'search',
        ]]);
    }

    public function index()
    {
        $student = Student::orderBy('nisn', 'asc')->paginate(10);
        $data = array(
                    'student_list' => $student,
                    'student_total' => $student->total()
                );
        return view('student.index')->with($data);
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(StudentRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadPhoto($request);
        }

        $student = Student::create($input);
        
        $telephone = new Telephone;
        $telephone->nomor_telepon = $request->input('nomor_telepon');
        $student->telephone()->save($telephone);

        $student->hobbie()->attach($request->input('hobi_siswa'));

        Session::flash('flash_message', 'Data siswa berhasil disimpan.');

        return redirect('student');
    }

    public function edit(Student $student)
    {
        $student->nomor_telepon = $student->telephone->nomor_telepon;
        $data = array('student' => $student);
        return view('student.edit')->with($data);
    }

    public function update(Student $student, StudentRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('foto')) {
            $this->deletePhoto($student);
            $input['foto'] = $this->uploadPhoto($request);
        }

        $student->update($input);
        
        $telephone = $student->telephone;
        $telephone->nomor_telepon = $request->input('nomor_telepon');
        $student->telephone()->save($telephone);
        $student->hobbie()->sync($request->input('hobi_siswa'));

        Session::flash('flash_message', 'Data siswa berhasil diupdate.');

        return redirect('student');
    }

    public function destroy(Student $student)
    {
        $this->deletePhoto($student);
        $student->delete();
        Session::flash('flash_message', 'Data siswa berhasil dihapus.');
        Session::flash('important', true);
        return redirect('student');
    }

    public function show(Student $student)
    {
        $data = array('student' => $student);
        return view('student.show')->with($data);
    }

    public function search(Request $request)
    {
        $keyword = trim($request->input('keyword'));

        if (! empty($keyword)) {
            $gender = $request->input('jenis_kelamin');
            $id_class = $request->input('id_kelas');

            //Query
            $query = Student::where('nama_siswa', 'LIKE', '%' . $keyword . '%');
            (! empty($gender)) ? $query -> Gender($gender) : '';
            (! empty($id_class)) ? $query -> Classe($id_class) : '';
            $student_list = $query->paginate(10);

            //URL Links pagination
            $pagination = (! empty($gender)) ? $student_list->appends(['jenis_kelamin' => $gender]) : '';
            $pagination = (! empty($id_class)) ? $student_list->appends(['id_kelas' => $id_class]) : '';
            $pagination = (! empty($keyword)) ? $student_list->appends(['keyword' => $keyword]) : '';
            
            $student_total = $student_list->total();
            
            $data = array(
                    'keyword' => $keyword,
                    'gender' => $gender,
                    'id_class' => $id_class,
                    'student_list' => $student_list,
                    'pagination' => $student_list->appends($request->except('page')),
                    'student_total' => $student_list->total()
                );
            return view('student.index')->with($data);
        }
        return redirect('student');
    }

    private function uploadPhoto(StudentRequest $request)
    {
        $photo = $request->file('foto');
        $ext = $photo->getClientOriginalExtension();

        if ($request->file('foto')->isValid()) {
            $photo_name = date('YmdHis'). ".$ext";
            $upload_path = 'fotoupload';
            $request->file('foto')->move($upload_path, $photo_name);
            return $photo_name;
        }
        return false;
    }

    private function deletePhoto(Student $student)
    {
        $exist = Storage::disk('foto')->exists($student->foto);
        if (isset($student->foto) && $exist) {
            $delete = Storage::disk('foto')->delete($student->foto);
            if ($delete) {
                return true;
            }
            return false;
        }
    }
}
