<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaimEditRequest extends FormRequest
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
            'square_restored_area' => 'required',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image6' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'claim_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_of_sign' => 'required',
            'date_of_sending' => 'required',
            'date_of_fixing' => 'required',
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
            'square_restored_area.required' => 'Обязательное поле',
            'image1.image' => 'Файл должен быть фото',
            'image1.mimes' => 'Поддерживаемые типы jpeg,png,jpg,gif',
            'image2.mimes' => 'Поддерживаемые типы jpeg,png,jpg,gif',
            'image3.mimes' => 'Поддерживаемые типы jpeg,png,jpg,gif',
            'image4.mimes' => 'Поддерживаемые типы jpeg,png,jpg,gif',
            'image5.mimes' => 'Поддерживаемые типы jpeg,png,jpg,gif',
            'image6.mimes' => 'Поддерживаемые типы jpeg,png,jpg,gif',
            'claim_photo.required' => 'Обязательное поле',
            'date_of_sign.required' => 'Обязательное поле',
            'date_of_sending.required' => 'Обязательное поле',
            'date_of_fixing.required' => 'Обязательное поле',
            "user_id.required" => 'Обязательное поле'
        ];
    }
}
