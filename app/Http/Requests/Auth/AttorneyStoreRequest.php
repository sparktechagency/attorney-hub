<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AttorneyStoreRequest extends FormRequest
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
            'attorney_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'company_name' => 'required|string',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipCode' => 'required',
            'phone' => 'required|string|max:20',
            'area_of_practice' => 'required|array',
            'state_of_bar_admission_and_court' => 'nullable|string|max:255',
            'year_of_admission_to_bar' => 'required|digits:4',
            'email' => 'required|email|max:255|unique:users,email',
            'website' => 'nullable|url|max:255',
            'login_name' => 'required|string|min:5|max:50|regex:/^[^\\s]+$/',
            'password' => 'required|string|min:5|max:255|regex:/^[^\\s]+$/',
            'password_confirmation' => 'required|string|min:5|max:255|regex:/^[^\\s]+$/|same:password',
            
        ];
    }
}
