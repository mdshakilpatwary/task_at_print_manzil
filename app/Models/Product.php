<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Product extends Model
{
    protected $fillable = [
        'id',
        'cat_id',
        'store_id',
        'user_id',
        'name',
     
        
    ];

    function category(){
        return $this->belongsTo(Category::class, 'cat_id', 'id');
     }
    function store(){
        return $this->belongsTo(Store::class, 'store_id', 'id');
     }
    function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
     }
}
