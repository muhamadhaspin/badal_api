<?php

namespace App\Http\Requests\Country;

use App\Http\Traits\HasJsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateCountryRequest extends FormRequest
{
    use HasJsonResponse;

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "id" => $this->route("country"),
        ]);
    }

    public function rules(): array
    {
        return [
            //? Country Validation
            "id" => "required|numeric|exists:countries,id",
            "name" => "required|string|unique:countries,name," . $this->id,
            "short_code" => "required|string|min:2|max:2|unique:countries,short_code," . $this->id,
            "long_code" => "required|string|min:3|max:3|unique:countries,long_code," . $this->id,

            //? Nationality Validation
            "nationality_name" => "required|string|unique:nationalities,name," . $this->id,

            //? Currency Validation
            "currency_name" => "required|string|unique:currencies,name," . $this->id,
            "currency_code" => "required|string|unique:currencies,code," . $this->id,

            //? Phone Validation
            "phone_code" => "required|string|unique:phones,code," . $this->id
        ];
    }

    public function messages()
    {
        return [
            //? Country Validator Message
            "id.required" => "Country is missing",
            "id.numeric" => "Country is invalid",
            "id.exists" => "No Country found",

            "name.required" => "Country Name can't be Empty",
            "name.unique" => "This name has already taken",

            "short_code.required" => "Short code can't be Empty",
            "short_code.unique" => "this Short code has already taken",
            "short_code.*" => "Short code should be 2 characters",

            "long_code.required" => "Long code can't be Empty",
            "long_code.unique" => "this Long code has already taken",
            "long_code.*" => "Long code should be 3 characters",

            //? Nationality Validator Message
            "nationality_name.required" => "Nationality Name can't be Empty",
            "nationality_name.unique" => "This name has already taken",

            //? Currency Validator Message
            "currency_name.required" => "Currency Name can't be Empty",
            "currency_name.unique" => "This name has already taken",

            "currency_code.required" => "Currency Code can't be Empty",
            "currency_code.unique" => "This code has already taken",

            //? Phone Validator Message
            "phone_code.required" => "Phone Code can't be Empty",
            "phone_code.unique" => "This code has already taken"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->throwResponse($validator->errors()->first());
    }
}
