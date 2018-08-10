<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsCreateRequest extends FormRequest
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
            'summary'=>'required|min:2',
            'body'=>'required|min:2',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Tiêu đề không được trống',
            'name.min'=>'Tiêu đề tối thiểu :min ký tự',
            'name.max'=>'Tiêu đề tối đa :max ký tự',
            'summary.required'=>'Tóm tắt bài viết không được trống',
            'summary.min'=>'Tóm tắt bài viết tối thiểu :min ký tự',
            'body.required'=>'Nội dung không được trống',
            'body.min'=>'Nội dung tối thiểu :min ký tự',
        ];
    }
}
