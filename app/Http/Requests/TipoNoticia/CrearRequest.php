<?php

namespace App\Http\Requests\TipoNoticia;

use Illuminate\Foundation\Http\FormRequest;


class CrearRequest extends FormRequest
{
    public function authorize()
    {
        /* return auth()->check(); */
        return true;
    }

    public function rules()
    {
        return [
            'tipo' => 'required'
        ];
    }
}
