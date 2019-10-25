<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'PATCH') {
            $nisn_rules = 'required|string|size:4|unique:students,nisn,'. $this->get('id');
            $telephone_rules = 'sometimes|nullable|numeric|digits_between:10,15
                                |unique:telephones,nomor_telepon,'
                                . $this->get('id') . ',id_siswa';
        } else {
            $nisn_rules = 'required|string|size:4|unique:students,nisn';
            $telephone_rules = 'sometimes|nullable|numeric|digits_between:10,15
                                |unique:telephones,nomor_telepon';
        }
        return [
            'nisn'          => $nisn_rules,
            'nama_siswa'    => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => $telephone_rules,
            'id_kelas'      => 'required',
            'foto'          => 'sometimes|image|max:500|mimes:jpg,jpeg,bmp,png',
        ];
    }
}
