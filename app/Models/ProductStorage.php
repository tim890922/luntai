<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStorage extends Model
{   
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'product_id','storage_id','quantity','basket_number','change_status','time','responsible'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
