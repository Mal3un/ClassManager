<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authCheck(Request $request)
    {
        session()->start();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only(['username', 'password']))) {
            Auth::login(auth()->user());
            if(auth()->user()->role_id === 3) {
                $user = Teacher::where('user_id', auth()->user()->id)->first(['id','first_name','last_name','gender'])->toArray();
                session()->put('user', $user);
                return redirect()->route('manager.welcome');
            }else if(auth()->user()->role_id === 2) {
                $user = Teacher::where('user_id', auth()->user()->id)->first(['id','first_name','last_name','gender'])->toArray();
                session()->put('user', $user);
                return redirect()->route('manager.welcome');
            }else if(auth()->user()->role_id === 1) {
                $user = Student::where('user_id', auth()->user()->id)->first(['id','first_name','last_name','gender'])->toArray();
                session()->put('user', $user);
                return redirect()->route('student.welcome');
            }
        }

        return redirect()->route('login')->withErrors(['message' => 'Invalid credentials']);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
