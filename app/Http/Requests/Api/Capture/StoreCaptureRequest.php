<?php

namespace App\Http\Requests\Api\Capture;
use App\Http\Requests\BaseRequest;

class StoreCaptureRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public $warning;
    
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
            'payroll_no'=> ['required'],
            'file' => ['required'],
            'id_number' => ['required']
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'payroll_no.required' => 'Payroll number required',
            'file.required' =>'File required',
            'id_number.required' =>'Id number required',
        ];
    }
}
