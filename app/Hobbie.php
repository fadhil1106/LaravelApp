<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobbie extends Model
{
    protected $fillable = ['nama_hobi'];

    public function student()
    {
        return $this->belongsToMany('App\Student', 'student_hobbies', 'id_hobi', 'id_siswa');
    }
}
