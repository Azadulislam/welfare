<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKhairatMembersRequest extends FormRequest
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
            'member_id' => 'required',
            'approval_date' => 'required',
            'member_start_date' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'member_start_date' => "Membership Start Date"
        ];// TODO: Change the autogenerated stub
    }
}
