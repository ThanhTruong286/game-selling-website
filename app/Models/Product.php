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
        return $this->belongsTo(Category::class,'categories_id');//su dung categories_id lam chia khoa ngoai giua Product va Category Models
    }
    public function review(){
        return $this->hasOne(Review::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tags::class,'products_tags');
    }
    public function developer(){
        return $this->belongsTo(Developers::class,'dev_id');
    }
}
