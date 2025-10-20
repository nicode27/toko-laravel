<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produkController extends Controller
{
    public function index(){
        $produk = 'Botol Minum 1000ml';
        return view('product/index', compact('produk'));
    }
}
