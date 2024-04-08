<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    use HasFactory;
    public function Category()
    {
        return $this->belongsTo(Category::class,'categories_id');//su dung categories_id lam chia khoa ngoai giua Product va Category Models
    }
}
