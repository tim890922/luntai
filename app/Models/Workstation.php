<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workstation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'workstation_name','procedure'];

    public function machine_products(){
        return $this->hasMany(MachineProduct::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
