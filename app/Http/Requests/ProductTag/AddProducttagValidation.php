<?php

namespace App\Http\Requests\ProductTag;

use Illuminate\Foundation\Http\FormRequest;

class AddProducttagValidation extends FormRequest
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
            'title' => 'max:255|required',
           // 'key'  => 'required|unique:menu,key|max:225',
        ];
    }
}
