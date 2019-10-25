<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ClasseRequest;
use App\Classe;
use Validator;
use Session;

class ClasseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $class_list = Classe::all();
        $data = array('class_list' => $class_list, );
        return view('class.index')->with($data);       
    }

    public function create()
    {
        return view('class.create');
    }

    public function store(ClasseRequest $request)
    {
        Classe::create($request->all());
        Session::flash('flash_message','Data kelas berhasil disimpan.');
        return redirect('class');
    }

    public function show($id)
    {
        
    }

    public function edit(Classe $classe)
    {
        $data = array('classe' => $classe, );
        return view('class.edit')->with($data);
    }

    public function update(Classe $classe, ClasseRequest $request)
    {
        $classe->update($request->all());
        Session::flash('flash_message','Data kelas berhasil diupdate');
        return redirect('class');
    }

    public function destroy(Classe $classe)
    {
        $classe->delete();
        Session::flash('penting', true);
        return redirect('class');
    }
}
