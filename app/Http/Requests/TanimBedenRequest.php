<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TanimBedenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'    => 'nullable|numeric|exists:App\Models\TanimBeden,id',
            'body'  => 'required',
            'bust'  => 'required',
            'waist' => 'required',
            'hip'   => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'body'  => 'Beden Giriniz',
            'bust'  => 'Gögüs (cm) Giriniz',
            'waist' => 'Bel (cm) Giriniz',
            'hip'   => 'Kalça (cm) Giriniz',
        ];
    }
}
