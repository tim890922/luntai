<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =
    ['id','supplier_id','name','type','inventory','safety','unit','material','Specification'];
    protected $keyType='string';

    
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function material_changes(){
        return $this->hasMany(MaterialChange::class);
    }
}
