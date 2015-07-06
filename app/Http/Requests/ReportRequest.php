<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReportRequest extends Request
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
            'description' => 'required|min:3',
        ];
    }

     /**
     * Get the customized messages that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'description.required' => 'Vi behöver ha en kort förklarande text på varför detta event ska flaggas.',
        ];
    }

}
