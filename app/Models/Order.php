<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id','shipping','user','user_name','P_F','order_number','delivery','quantity','package','status'
    ];

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }

}
