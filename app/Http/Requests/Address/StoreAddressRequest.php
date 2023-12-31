<?php

namespace App\Http\Requests\Address;

use App\Http\Traits\HasJsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreAddressRequest extends FormRequest
{
    use HasJsonResponse;

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'address' => 'required|string',
            'postcode' => 'required|string|max:10',
            'city_id' => 'required|numeric|exists:cities,id',
            'user_id' => 'required|numeric|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Address Name can\'t be Empty',

            'postcode.required' => 'Postal Code can\'t be Empty',
            'postcode.max' => 'Postal Code maximal 10 Digits',

            'city_id.required' => 'City is missing',
            'city_id.exists' => 'no City found',

            'user_id.required' => 'User is missing',
            'user_id.exists' => 'no User found',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->throwResponse($validator->errors()->first());
    }
}
