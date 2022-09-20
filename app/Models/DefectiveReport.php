<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DefectiveReport extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id','defective_id','report_id','quantity','detail'];

    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function defective(){
        return $this->belongsTo(Defective::class);
    }
}
