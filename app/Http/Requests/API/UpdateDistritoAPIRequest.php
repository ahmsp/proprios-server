<?php

namespace Proprios\Http\Requests\API;

use Proprios\Models\Distrito;
use InfyOm\Generator\Request\APIRequest;

class UpdateDistritoAPIRequest extends APIRequest
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
        return Distrito::$rules;
    }
}
