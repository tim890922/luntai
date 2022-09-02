<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id','name','telephone'];

    public function materials(){
        return $this->hasMany(Material::class);
    }
}
