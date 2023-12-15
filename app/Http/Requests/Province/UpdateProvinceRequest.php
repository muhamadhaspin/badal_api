<?php

namespace App\Http\Requests\Province;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProvinceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => 'required|numeric|exists:provinces,id',
            'name' => 'required|string',
            'country_id' => 'nullable|numeric|exists:countries,id',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Province is missing',
            'id.numeric' => 'Province is invalid',
            'id.exists' => 'No Province found',

            'name.required' => 'Province Name can\'t be Empty',

            'country_id.exists' => 'no Country found',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'message' => $validator->errors()->first(),
                ],
                400
            )
        );
    }
}
