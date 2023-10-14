<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;

class ProfileController extends Controller
{
    //
    public function show($id)
    {
        $data = User::find($id);
        //dd($data);
        $this->data['user'] = $data;
        return view('profile.edit', $this->data);
    }
    public function edit($id)
    {
        $data = User::find($id);
        //dd($data);
        $this->data['user'] = $data;
        return view('profile.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
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
}
