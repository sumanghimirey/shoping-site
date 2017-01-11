<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class PageAddValidation extends FormRequest
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
            'menu_id' => 'required|integer',
            'title' => 'required|max:255',
            'description' => 'required',
            'banner' => 'required|image'
        ];
    }

    public function messages() {
        return [
            'menu_id.integer' => 'Please, add valid Menu Id.',
            'title.required' => 'Please, add title.',
            'title.max' => 'Please, add max 3 characters.',
        ];
    }
}
