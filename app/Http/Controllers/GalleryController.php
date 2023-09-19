<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.product.products');
    }

    public function create()
    {
        return view('admin.product.product');
    }
}
