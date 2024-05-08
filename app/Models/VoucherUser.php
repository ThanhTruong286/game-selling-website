<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherUser extends Model
{
    use HasFactory;
    protected $table = 'voucher_user';
    public function voucher(){
        return $this->belongsTo(Voucher::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
