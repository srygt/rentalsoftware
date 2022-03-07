<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaturaOdemeRequest extends FormRequest
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
            'id'                => 'nullable|numeric|exists:App\Models\FaturaOdeme,id',
            'uuid'              => 'required:string',
            'fatura_no'         => 'required:string',
            'fatura_detay'      => 'required:string',
            'odemedurumu'       => 'required:numeric',
            'odemenotu'         => 'nullable',
            'odemetutari'       => 'required|between:0,99.99',
        ];
    }

    public function attributes(){
        return [
            'fatura_no'        => 'Fatura Seçiniz',
            'fatura_detay'     => 'Fatura Detayı Giriniz',
            'odemedurumu'      => 'Fatura ödeme Durumunu Belirtin',
            'odemenotu'        => 'Fatura Ödeme Notu Giriniz',
            'odemetutari'      => 'Fatura Ödeme Tutarını Giriniz',
        ];
    }
}
