<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;
use App\Models\Product;
use Auth;


class AllItemController extends Controller
{
    public function store_index(){
        $stores = Store::all();
        return view('store', compact('stores'));
    }
    public function store(Request $request){

        $request->validate([
            'store_name' => 'required|unique:stores,store_name',
            
        ],
        [
            'store_name.required' => 'Category name is required',
           
        ]);
    
        $store = New Store;

        $store->store_name = $request->store_name;

        $insert = $store->save();
        if($insert){
            return redirect()->back()->with('success', 'Successfully data Submitted');

        }
        else{
            return redirect()->back()->with('error', 'Opps! data not Submitted');

        }

    }
    public function category_index(){
        $categories = Category::all();

        return view('category', compact('categories'));

    }
    public function cat_store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            
        ],
        [
            'category_name.required' => 'Category name is required',
           
        ]);
    
        $category = New Category;

        $category->category_name = $request->category_name;

        $insert = $category->save();
        if($insert){
            return redirect()->back()->with('success', 'Successfully data Submitted');

        }
        else{
            return redirect()->back()->with('error', 'Opps! data not Submitted');

        }
    }

    public function product_store(Request $request){
        $request->validate([
            'product_name' => 'required',
            'select_store' => 'required',
            'select_category' => 'required',
     
        ]);
    
        $product = New Product;

        $product->name = $request->product_name;
        $product->cat_id = $request->select_category;
        $product->store_id = $request->select_store;
        $product->user_id = Auth::user()->id;

        $insert = $product->save();
        if($insert){
            return redirect()->back()->with('success', 'Successfully data Submitted');

        }
        else{
            return redirect()->back()->with('error', 'Opps! data not Submitted');

        }
    }
}
