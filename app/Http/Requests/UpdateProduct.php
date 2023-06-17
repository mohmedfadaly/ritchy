<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'card_image'         =>'nullable|mimes:jpeg,png,jpg,gif',
            'name'               =>'required|max:190|min:5|string',
            'price'              =>'required',
            'desc'               =>'required',
        ];
    }
}
