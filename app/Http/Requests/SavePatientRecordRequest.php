<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SavePatientRecordRequest extends Request
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
            'symptoms'     => 'required|max:1000|min:5',
            'tests'        => 'required|max:100|min:5',
            'test_results' => 'required|max:100|min:5',
            'diagnosis'    => 'required|max:100|min:5',
            'prescription' => 'required|max:1000|min:5'
        ];
    }
}
