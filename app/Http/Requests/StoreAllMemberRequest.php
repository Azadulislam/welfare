<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAllMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
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
            'name' => 'required',
            'ic_no' => 'required|unique:all_members,ic_no',
            'member_status_ids' => 'required|array',
            'birth_date' => 'required',
            'citizenship' => 'required',
            'gender' => 'nullable',
            'home_address1' => 'required',
            'mobile_phone' => 'required',
            'telephone_one' => 'nullable',
            'marital_status_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Full Name',
            'member_status_ids' => 'Member Type',
            'mobile_phone' => 'Applicant (Hand phone)',
            'telephone_one' => 'Telephone (Home)',
            'ic_no' => 'IC No',
            'images' => 'Image',
            'marital_status_id' => 'Marital Status',
            'home_address1' => 'Address 1',
            'birth_date' => 'Date Of Birth',
        ]; // TODO: Change the autogenerated stub
    }
}
