<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $user_list = User::all();
        $data = array('user_list' => $user_list );
        return view('user.index')->with($data);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:100|unique:users',
            'password'  => 'required|confirmed|min:6',
            'level'     => 'required|in:admin,operator',
        ]);

        if ($validasi->fails()) {
            return redirect('user/create')
                        ->withErrors($validasi)
                        ->withInput();
        }

        //Hash Password
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        Session::flash('flash_message', 'Data user berhasil disimpan.');

        return redirect('user');
    }

    public function show($id)
    {
        return redirect('user');
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        $data = array('user' => $user);
        return view('user.edit')->with($data);
    }

    public function update($id, Request $request)
    {
        $user = User::findorfail($id);
        $data = $request->all();

        

        $validasi = Validator::make($data, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:100|unique:users,email,'. $data['id'],
            'password'  => 'sometimes|nullable|confirmed|min:6',
            'level'     => 'required|in:operator,admin',
        ]);

        if ($validasi->fails()) {
            return redirect("user/$id/edit")
                        ->withInput()
                        ->withErrors($validasi);
        }

        

        //Hash Password
        if ($request->has('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data = array_except($data, ['password']);
        }

        $user->update($data);
        Session::flash('flash_message', 'Data user berhasil diupdate.');

        return redirect('user');
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        Session::flash('flash_message', 'Data user berhasil dihapus.');
        Session::flash('important', true);
        return redirect('user');
    }
}
