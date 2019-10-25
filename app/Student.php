<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_kelas',
        'foto',
    ];

    protected $dates = ['tanggal_lahir'];

    public function getNamaSiswaAttribute($student_name)
    {
        return ucwords($student_name);
    }

    public function setNamaSiswaAttribute($student_name)
    {
        $this->attributes['nama_siswa'] = strtolower($student_name);
    }

    public function getStudentHobbiesAttribute(Type $var = null)
    {
        return $this->hobbie->lists('id')->toArray();
    }

    public function telephone()
    {
        return $this->hasOne('App\Telephone', 'id_siswa');
    }

    public function classe()
    {
        return $this->belongsTo('App\Classe', 'id_kelas');
    }

    public function hobbie()
    {
        return $this->belongsToMany('App\Hobbie', 'student_hobbies', 'id_siswa', 'id_hobi')->withTimeStamps();
    }

    public function scopeClasse($query, $id_class)
    {
        return $query->where('id_kelas', $id_class);
    }

    public function scopeGender($query, $gender)
    {
        return $query->where('jenis_kelamin', $gender);
    }
}
