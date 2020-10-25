<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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

            "first_name" => "required",
            "last_name" => "required",
            "nationality" => "required",
            "position" => "required",
            "date_birth" => "required",
            "country_id" => "required",
            "club_id" => "required",
            "image" => "required", 
            "market_value" => "required"

        ];
    }
}
