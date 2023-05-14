<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $table='students' ;
    protected $fillable = [
        'IDno', // add IDno to the list of fillable fields
        'name',
        'age',
        'track_id',
        'user_id',
    ];
function user(){
    return $this->belongsTo(User::class,'user_id');
}
}
