<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DefectiveSchedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id','defective_id','schedule_id','quantity'];
}
