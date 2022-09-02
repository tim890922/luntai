<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Defective extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id', 'reason'];

    
    public function scheduels(){
        return $this->belongsToMany(Schedule::class);
    }


}
