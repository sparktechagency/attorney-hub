<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [


            'office' => 'required|exists:offices,id',
            'department' => 'required|exists:departments,id',
            'name' => 'required',
            'user_id'=> 'required|unique:employees',
            'gender' => 'required|boolean',
            'email' => 'email|unique:employees',
            'date_of_birth' => 'nullable|date_format:Y-m-d',
            'join_date' => 'nullable|date_format:Y-m-d',
            'sallary' => 'required',
            'contact_number' => 'nullable',
            'employee_status' => 'nullable',
            'designation' => 'nullable',
            

        ];
    }
}
