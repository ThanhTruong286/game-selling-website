<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);//su dung categories_id lam chia khoa ngoai giua Product va Category Models
    }
    public function product()
    {
        return $this->hasMany(Product::class);//su dung categories_id lam chia khoa ngoai giua Product va Category Models
    }
}
