<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eventRequest extends FormRequest
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
            'locator' => 'required',
            'country' => 'required',
            'customer' => 'required',
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location' => 'required',
            'delivery_days' => 'required',
        ];
    }
}
