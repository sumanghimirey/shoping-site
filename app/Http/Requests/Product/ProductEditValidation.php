<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditValidation extends FormRequest
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
            'name'              =>  'required|max:255',
            'old_price'        =>  'required',
            'new_price'        =>  'required',
            'quantity'         =>  'required',

        ];
    }

    public function messages() {
        return [
            'name.required'                => 'Please, add Product Name.',
            'name.max'                     => 'Please, add max 255 characters.',
            'old_price.required'           => 'Please, add Product Old Price.',
            'new_price.required'           => 'Please, add Product New Price.',
            'quantity_desc.required'       => 'Please, add Quantity.',


        ];
    }
}
