<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'id_siswa',
        'nomor_telepon',
    ];
    
    
    public function student()
    {
        return $this->belongsTo('App\Student', 'id_siswa');
    }
}
