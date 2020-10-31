<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {

        return [
            'user_phone.required' => 'A user_phone is required',
            'region_id.required' => 'A region_id is required',
            'password.required' => 'A password is required',
            'long.required' => 'A long is required',
            'lat.required' => 'A lat is required',
            'images.array' => 'A images must be array',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules;
        if ($this->getMethod() == 'POST') {
            if ($this->is('registre')) {
                $rules = User::VALIDATION_RULE_STORE;
            }elseif($this->is('changePassword')){
                $rules = User::VALIDATION_RULE_CHANGE_PASSWORD;
            } else {
                $rules = User::VALIDATION_RULE_LOGIN;
            }
        } else {
            $rules = User::VALIDATION_RULE_UPDATE;
        }
        return User::VALIDATION_RULE_UPDATE;
    }
}
