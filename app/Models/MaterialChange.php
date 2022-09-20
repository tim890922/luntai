<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialChange extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'id','material_id','change_status','quantity'
    ];

    public function material(){
        return $this->belongsTo(Material::class);
    }
}
