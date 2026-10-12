<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable('joining_date' , 'certification' , 'user_id')]
class Teacher extends Model
{
    use HasFactory ;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function courses(){
        return $this->hasMany(Course::class );
    }

}
