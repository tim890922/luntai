<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'client_name','client_phone'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function clientusers(){
        return $this->hasMany(Clientuser::class);
    }
}
