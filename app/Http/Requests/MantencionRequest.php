<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MantencionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
