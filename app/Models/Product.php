<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
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
