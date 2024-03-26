<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaimRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'neighborhood' => 'required',
            'invent_num' => 'required',
            'date_of_excavation' => 'required',
            'date_recovery_ABP' => 'required',
            'open_square' => 'required',
            'street_type' => 'required',
            'type_of_work' => 'required',
            'address' => 'required',
            'direction' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'neighborhood.required' => ' Обязательное поле',
            'invent_num.required' => 'Обязательное поле',
            'date_of_excavation.required' => 'Обязательное поле',
            'date_recovery_ABP.required' => 'Обязательное поле',
            'open_square.required' => 'Обязательное поле',
            'street_type.required' => 'Обязательное поле',
            'type_of_work.required' => 'Обязательное поле',
            'address.required' => 'Обязательное поле',
            'direction.required' => 'Обязательное поле',
        ];
    }
}
