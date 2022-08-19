<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'manufacturer', 'tonnes', 'ring', 'number', 'type', 'weight','diameter','tube_material','screw_width','min_max','screw_material','status'];

    protected $keyType='string';
}
