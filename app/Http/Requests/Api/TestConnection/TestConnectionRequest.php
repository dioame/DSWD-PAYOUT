<?php

namespace App\Http\Requests\Api\TestConnection;
use App\Http\Requests\BaseRequest;
use App\Services\Admin\Capture\StoreCaptureService;

class TestConnectionRequest extends BaseRequest
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
            'id_number'=> ['required'],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'id_number.required' => 'Id number required',
        ];
    }
}
