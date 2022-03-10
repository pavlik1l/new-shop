<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() {
        // $products = Product::where('id', 5)->first();

        return view('home.index');
    }
}
