<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MachineProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'product_id','workstation_id','priority','cycle_time','morning_employee','night_employee','cavity','non_performing_rate'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function workstation(){
        return $this->belongsTo(Workstation::class);
    }
    
    
    
}
