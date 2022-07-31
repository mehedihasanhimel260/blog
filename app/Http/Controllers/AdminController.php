<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('backend.auth.login');
    }
    public function login(Request $Request)
    {
        $this->validate(
            $Request,
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );
        $admin = Admin::where('email', $Request->email)->first();
        if (!$admin) {
            session()->flash('error', 'your email invalid');
            return redirect()->back();
        } else {
            if (password_verify($Request->password, $admin->password)) {
                session()->put('adminID', $admin->id);
                session()->put('adminName', $admin->name);
                return redirect('/admin/dashboard');
            } else {
                session()->flash('error', 'your password not match');
                return redirect()->back();
            }
        }
    }
    public function dashboard()
    {
        return view('backend.home.index');
    }
    public function adminlogout()
    {
        session()->flush();
        return redirect('/admin/login');
    }
}