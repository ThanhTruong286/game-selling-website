<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    use HasFactory;
    
    public function product()
    {
        return $this->hasMany(Product::class);//su dung categories_id lam chia khoa ngoai giua Product va Category Models
    }
    public function category()
    {
        return $this->belongsTo(Category::class);//su dung categories_id lam chia khoa ngoai giua Product va Category Models
    }
}
