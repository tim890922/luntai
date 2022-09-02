<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientuser extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $keyType='string';
    protected $fillable=
        ['id','client_id','name','address'];
        
    public function orders(){
        return $this->hasMany(Order::class);
    }
    
    public function client(){
        return $this->belongsTo(Client::class);
    }

}
