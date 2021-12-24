<?php

namespace App\Http\Controllers;

use App\Models\Genders;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function mainView()
    {
        $posts = Posts::all();
        return view('user.main',compact('posts'));
    }

    public function regView()
    {
        if (!Auth::user()) {
            $genders = Genders::all();
            return view('user.reg', compact('genders'));
        } else {
            return redirect('/');
        }
    }

    public function regPost(Request $request)
    {
        $request->validate(
            [
                'login' => 'required|unique:users',
                'gender_id' => 'required',
                'password' => 'required|confirmed'
            ]
        );
        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect('auth');
    }

    public function authView()
    {
        if (!Auth::user()) {
            return view('user.auth');
        } else {
            return redirect('/');
        }

    }

    public function authPost(Request $request)
    {
        $request->validate(
            [
                'login' => 'required',
                'password' => 'required'
            ]
        );
        if (Auth::attempt($request->only('login', 'password'))) {
            $request->session()->regenerate();
            return redirect('lk');
        } else {
            return back()->withErrors(['autherror' => 'не верный логин или
             пароль']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function lkVIew()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            $genders = Genders::all();
            return view('user.lk', compact('user', 'genders'));
        } else {
            return redirect('/');
        }

    }
}
