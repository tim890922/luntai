<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workstation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'schedule_id','product_id','employee_id','shift','time_start','time_end','good_product_quantity','defective_product_quantity','record'];
}