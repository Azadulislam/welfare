<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWelfareServiceRequest extends FormRequest
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
            'member_id' => 'required',
            'years' => 'required|array',
            'current_job' => 'required',
            'date_apply' => 'required',
            'unemployed_reason' => 'nullable|required_if:current_job,Un Employed',
            'home_status_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'help_cat_id' => 'Help Category',
            'member_id' => 'Member',
            'years' => 'Years',
            'current_job' => 'Current Job',
            'home_status_id' => 'Home Status',
            'images' => 'Images',
            'unemployed_reason' => 'Unemployed Reason'
        ]; // TODO: Change the autogenerated stub
    }
}
