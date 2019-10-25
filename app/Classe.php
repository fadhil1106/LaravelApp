<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        'nama_kelas'
    ];

    public function student()
    {
        return $this->hasMany('App\Student', 'id_kelas');
    }
}
