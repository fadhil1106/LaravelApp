<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HobbieRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return ['nama_hobi' => 'required|string|max:30'];
    }
}
