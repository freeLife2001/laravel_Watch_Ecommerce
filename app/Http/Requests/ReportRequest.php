<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'from_date'=>'required|before:today|date',
            'to_date'=>'required|date'
        ];
    }
    public function messages(){
        return [
            'from_date.required'=>'Ngày bắt đầu không được trống',
            'from_date.before'=>'Ngày bắt đầu không được lớn hơn ngày hiện tại',
            'from_date.date'=>'Ngày bắt đầu không đúng dịnh dạng',


            'to_date.required'=>'Ngày kết thúc không được trống',
            'to_date.date'=>'Ngày kết thúc không đúng dịnh dạng',
        ];
    }
}
