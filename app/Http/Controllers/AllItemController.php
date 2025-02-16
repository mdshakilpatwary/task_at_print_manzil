<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllItemController extends Controller
{
    public function store_index(){
        return view('store');
    }
    public function store(){}
    public function category_index(){
        return view('category');

    }
    public function cat_store(){}
}
