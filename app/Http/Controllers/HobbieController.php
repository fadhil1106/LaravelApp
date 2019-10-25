<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HobbieRequest;
use App\Hobbie;
use Validator;
use Storage;
use Session;

class HobbieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hobby_list = Hobbie::all();
        $data = array('hobby_list' => $hobby_list,);
        return view('hobby.index')->with($data);
    }

    public function create()
    {
        return view('hobby.create');
    }

    public function store(Request $request)
    {
        Hobbie::create($request->all());
        Session::flash('flash_message', 'Data hobi berhasil disimpan');
        return redirect('hobby');
    }

    public function edit(Hobbie $hobby)
    {
        $data = array('hobby' => $hobby);
        return view('hobby.edit')->with($data);
    }

    public function update(Hobbie $hobby, HobbieRequest $request)
    {
        $hobby->update($request->all());
        Session::flash('flash_message', 'Data hobi berhasil diupdate');
        return redirect('hobby');
    }

    public function destroy(Hobbie $hobby)
    {
        $hobby->delete();
        Session::flash('flash_message', 'Data hobi berhasil dihapus');
        Session::flash('penting', true);
        return redirect('hobby');
    }
}
