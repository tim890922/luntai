<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $keyType='string';
    protected $fillable=
        ['id','name','material','weight','tonnes','client_id'];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function machines(){
        return $this->belongsToMany(Machine::class);
    }

    public function materials(){
        return $this->belongsToMany(Material::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function storages(){
        return $this->belongsToMany(Storage::class);
    }

    public function product_storages(){
        return $this->hasMany(ProductStorage::class);
    }

}

