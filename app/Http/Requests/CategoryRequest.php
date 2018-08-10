<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'=>'required|min:2|max:190'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Tên chuyên mục không được trống',
            'name.min'=>'Tên chuyên mục tối thiểu 2 ký tự',
        ];
    }
}
