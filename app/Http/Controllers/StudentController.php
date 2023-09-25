<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('admin.student.students');
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('admin.student.edit', compact('student'));
    }
}
