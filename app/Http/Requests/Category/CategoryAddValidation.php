<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddValidation extends FormRequest
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
            'title'             =>  'required|max:255',
            'short_desc'        =>  'required|max:255',
            'long_desc'         =>  'required|max:255',
            'seo_title'         =>  'required|max:255',
            'seo_description'   =>  'required',
            'seo_keyword'       =>  'required',
        ];
    }

    public function messages() {
        return [
            'title.required'                => 'Please, add title.',
            'title.max'                     => 'Please, add max 255 characters.',
            'short_desc.required'           => 'Please, add Short description.',
            'short_desc.max'                => 'Please, add max 255 characters.',
            'long_desc.required'           => 'Please, add Short description.',
            'long_desc.max'                => 'Please, add max 255 characters.',


        ];
    }
}
