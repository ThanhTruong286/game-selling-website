<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    //lay ra cac vung can thiet
    protected $filltable = [
        'id','name','image','slug','create_at','update_at'
    ];
    public $timestamps = true;
    protected $dateFormat = 'd-m-Y';
}
