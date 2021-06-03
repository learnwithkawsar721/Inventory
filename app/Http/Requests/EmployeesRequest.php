<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'email'=>'required|unique:employees',
            'phone'=>'required',
            'address'=>'required',
            'photo'=>'required|image',
            'salary'=>'required',
            'vacation'=>'required',
            'city'=>'required',
            'nid'=>'required',
        ];
    }
}
