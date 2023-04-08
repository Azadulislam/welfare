<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeathRequest extends FormRequest
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
            'burial_contact_person' => 'required',
            'burial_contact_person_tel' => 'required',
            'date_of_death' => 'required',
            'cause_of_death' => 'nullable',
            'burial_place' => 'required',
            'done_by_mosque' => 'required'
        ];
    }
}
