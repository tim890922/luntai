<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id','product_id','procedure','queue'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
