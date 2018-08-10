<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersCreateRequest extends FormRequest
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
            'password' => 'required|min:6|',
            'repassword' => 'same:password',
            'role_id'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required|numeric|digits_between:10,11|unique:users',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Tên người dùng không được trống',
            'name.min'=>'Tên người dùng tối thiểu 2 ký tự',
            'password.required' => 'Mật Khẩu không được trống',
            'password.min' => 'Mật khẩu không được nhỏ hơn :min ký tự',
            'repassword.same' => 'Nhập Lại Mật Khẩu phải trùng với Mật Khẩu',
            'role_id.required' => 'Nhóm quyền không được trống',
            'email.required' => 'Email không được trống',
            'email.email' => 'Nhập sai định dạng Email',
            'email.unique' => 'Email phải là duy nhất',
            'phone.unique' => 'Số điện thoại phải là duy nhất',
            'phone.required'=>'Số điện thoại không được trống',
            'phone.digits_between' => 'Số điện thoại nằm trong khoảng từ 10 đến 11 số',
            'phone.numeric' => 'Số điện thoại phải là dạng số',
        ];
    }
}
