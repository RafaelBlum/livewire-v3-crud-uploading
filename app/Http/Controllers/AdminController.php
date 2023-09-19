<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/index', [
            'users' => User::all()->count(),
            'products' => Product::all()->count(),
            'students' => Student::all()->count()
        ]);
    }

    public function forms()
    {
        return view('admin/forms');
    }

    public function buttons()
    {
        return view('admin/buttons');
    }

    public function cards()
    {
        return view('admin/cards');
    }

    public function charts()
    {
        return view('admin/charts');
    }

    public function modals()
    {
        return view('admin/modals');
    }

    public function tables()
    {
        return view('admin/tables');
    }

    public function errors()
    {
        return view('admin/pages/404');
    }

    public function blank()
    {
        return view('admin/pages/blank');
    }

    public function createAccount()
    {
        return view('admin/pages/create-account');
    }

    public function forget()
    {
        return view('admin/pages/forgot-password');
    }

    public function login()
    {
        return view('admin/pages/login');
    }
}
