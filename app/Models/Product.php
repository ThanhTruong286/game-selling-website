<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function category(){
        return $this->belongsTo(Category::class,'category','id');
    }
    protected $filltable = [
        'id',
        'name',
        'price',
        'image',
        'content',
        'user_id',
        'category_id',
        'create_at'
    ];
}
