<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Storage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id','capacity'];
    protected $keyType='string';

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
