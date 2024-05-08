<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;
    protected $table = 'products_tags';
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function tag(){
        return $this->belongsTo(Tags::class);
    }
}
