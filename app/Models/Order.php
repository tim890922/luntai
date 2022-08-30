<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workstation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'product_id','clientuser_id','position','P_F','delivery','order_number','quantity','packages_quantity'];
}

