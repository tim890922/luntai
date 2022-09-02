<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MachineProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'product_id','machine_id','model_id','cycle_time','morning_employee','night_employee','cavity','non_performing_rate','priority'];
    
    
    
}
