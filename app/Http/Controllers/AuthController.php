<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Alamat email telah terdaftar!');
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['email'] = $user->email;
        $success['name'] = $user->name;

        return redirect('/login')->with('success', 'Registrasi sukses');
    }


    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Anda berhasil login');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function showProfile()
    {
        $user = auth()->user();
        return view('content.profile', compact('user'));
    }

    public function viewUpdateProfile()
    {
        $user = auth()->user();
        return view('content.profile.update_profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->telephone = $request['telephone'];
        $user->address = $request['address'];
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
}
