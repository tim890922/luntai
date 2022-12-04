<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id','product_id','material_id','quantity','unit'];
    
    public function material(){
        return $this->belongsTo(Material::class);
    }
    
}
