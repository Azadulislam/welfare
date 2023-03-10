<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHelpProvidedRequest extends FormRequest
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
            'help_cat_id' => 'required',
            'service_cost' => 'required',
            'help_type_id' => 'required',
            'approved_by' => 'required',
            'approved_date' => 'required',
            'payout_received_by' => 'required',
            'date_payout' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'help_cat_id' => 'Help Category',
            'help_type_id' => 'Help Type',
            'approved_by' => 'Authorized By',
            'approved_date' => 'Authorized Date',
            'payout_received_by' => 'Name Of Help Recipient',
            'date_payout' => 'Date Received'
        ]; // TODO: Change the autogenerated stub
    }
}
