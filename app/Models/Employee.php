<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $keyType='string';
    protected $fillable=['id','name','position','account','pass_word'];
}
