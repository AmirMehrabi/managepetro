<?php

namespace Modules\Client\App\Rules;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class ClientValidation extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'primary_email' => 'required|string|email|max:255|unique:clients,primary_email',
            'primary_phone' => 'required|string|max:255|unique:clients,primary_phone',
            'secondary_email' => 'nullable|string|email|max:255',
            'secondary_phone' => 'nullable|string|max:255',
            'is_organization' => 'boolean',
            'sms_notification' => 'boolean', // Remove this line
            'mail_notification' => 'boolean', // Remove this line
            'organization_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
        ];


        if ($this->isMethod('PUT')) {
            $rules['primary_email'] .= ',' . $this->route('client')->id;
            $rules['primary_phone'] .= ',' . $this->route('client')->id;
            if(request('password'))
            {
                $rules['password'] = 'required|string|min:8';
            }
        } else {
            $rules['password'] = 'required|string|min:8';
        }

        




        return $rules;
    }



    protected function prepareForValidation()
    {

        // Sanitazing the switch inputs before storing them as boolean
        $this->merge([
            'sms_notification' => $this->has('sms_notification'),
            'mail_notification' => $this->has('mail_notification'),
        ]);
    }
}