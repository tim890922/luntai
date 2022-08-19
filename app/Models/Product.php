<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $keyType ='string';
    protected $fillable=[
        'id','client','tonnes','price','product_name','weight','material'
    ];

    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
}
