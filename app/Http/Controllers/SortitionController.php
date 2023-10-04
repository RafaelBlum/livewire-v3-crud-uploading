<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortitionController extends Controller
{
    public function index()
    {
        return view('admin.sortition.index');
    }
}
