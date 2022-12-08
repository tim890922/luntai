<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'product_id','today','period_start','period_end','content','total_quantity','isAssign'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function defectives(){
        return $this->belongsToMany(Defective::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function workstation(){
        return $this->belongsTo(Workstation::class);
    }
    
}

