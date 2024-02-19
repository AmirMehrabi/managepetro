<?php

namespace Modules\Order\App\Rules;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class OrderValidation extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'client_id' => 'required|integer',
            'pipeline_id' => 'required|integer',
            'amount' => 'required|integer',
            'type' => 'required|string|max:75',
            'expected_delivery_date' => 'required|date'
        ];


        

        return $rules;
    }

}