<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name'=>'required|min:2|max:190',
            'category'=>'required|min:2|max:190',
            'avatar'=>'required|min:2|max:190'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Tên sản phẩm không được trống',
            'name.min'=>'Tên sản phẩm tối thiểu 2 ký tự',
            'name.max'=>'Tên sản phẩm tối đa 190 ký tự',
            'category.required'=>'Chuyên mục không được trống',
            'category.min'=>'Chuyên mục tối thiểu 2 ký tự',
            'category.max'=>'Chuyên mục tối đa 190 ký tự',
            'avatar.required'=>'Tên sản phẩm không được trống',
            'avatar.min'=>'Tên ảnh tối thiểu 2 ký tự',
            'avatar.max'=>'Tên ảnh tối đa 190 ký tự'
        ];
    }
}
