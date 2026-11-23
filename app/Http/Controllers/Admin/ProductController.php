<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(): View {
        return view('admin.product.index');
    }

    function create(): View {
        return view('admin.product.create');
    }
}
