<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repository\ContactRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    protected ContactRepository $contactRepo;

    // public function __construct(ContactRepository $contactRepo){
    //     $this->contactRepo = $contactRepo;
    // }
    public function showLoginForm(){
        return view('admin.auth.login');
    }


    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard.index');

        }

        return back()->withErrors([
            'email' => 'Invalid credentials!',
        ])->withInput();

    }


    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
