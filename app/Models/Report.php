<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'schedule_id','product_id','employee_id','shift','time_start','time_end','good_product_quantity','defective_product_quantity','record'];

    
    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function defective_reports(){
        return $this->hasMany(DefectiveReport::class);
    }



}