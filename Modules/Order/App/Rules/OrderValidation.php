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
            'title' => 'required|string|unique:orders,title|max:255',
            'client_id' => 'required|integer',
            'pipeline_id' => 'required|integer',
            'amount' => 'required|integer',
            'price_per_unit' => 'required|integer',
            'type' => 'required|string|max:75',
            'expected_delivery_date' => 'required|date'
        ];


        if ($this->isMethod('PUT')) {
            $rules['title'] .= ',' . $this->route('client')->id;

        }

        return $rules;
    }

}