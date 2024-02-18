<?php

namespace Modules\Truck\App\Rules;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class TruckValidation extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'driver_name' => 'required|string|max:255',
            'plate' => 'required|string|max:255|unique:trucks,plate',
            'model' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive,under_maintenance',
            'mileage' => 'required|integer|min:0',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ];

        if ($this->isMethod('PUT')) {
            // Unique license plate validation for update, excluding the current truck's license plate
            $rules['plate'] .= ',' . $this->route('truck')->id;
        }


        return $rules;
    }


}