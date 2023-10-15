<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = User::all();
        //dd($data);
        $this->data['user'] = $data;
        return view('user.index', $this->data);
    }

    public function create()
    {
        return view('user.create');
    }

    public function show($id)
    {
        $data = User::find($id);
        //dd($data);
        $this->data['user'] = $data;
        return view('user.detail', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $saveUser = $user->save();

        //dd($saveUser);
        if ($saveUser) {
            return redirect()->route('user.index')->with('success', 'Berhasil menambahkan user');
        } else {
            return redirect()->route('user.create')->with('error', 'Gagal menambahkan user');
        }
    }

    public function edit($id)
    {
        $data = User::find($id);
        //dd($data);
        $this->data['user'] = $data;
        return view('user.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $user = User::find($id);
        $user->name = $request->name;

        if ($request->email != $user->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);
            $user->email = $request->email;
        }

        if (empty($request->password)) {
            $user->password = $user->password;
        } else {
            $request->validate([
                'password' => ['required', 'string', 'min:8']
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect()->route('profile.edit', $user->id)->with('success', 'Profile updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Berhasil menghapus user');
    }
}
