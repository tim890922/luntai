<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class ProductController extends Controller
{
    public function index(){
        return view('home');
    }
}
