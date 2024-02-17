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
            'password' => 'required|string|min:8',
            'mail_notification' => 'boolean',
            'sms_notification' => 'boolean',
            'is_organization' => 'boolean',
            'organization_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
        ];

        // If the request method is PUT (update), add additional rules to ignore unique fields for the current client being updated
        if ($this->isMethod('PUT')) {
            $rules['primary_email'] .= ',' . $this->route('client')->id;
            $rules['primary_phone'] .= ',' . $this->route('client')->id;
        }

        return $rules;
    }
}