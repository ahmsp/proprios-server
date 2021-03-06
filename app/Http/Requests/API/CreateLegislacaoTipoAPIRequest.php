<?php

namespace Proprios\Http\Requests\API;

use Proprios\Models\LegislacaoTipo;
use InfyOm\Generator\Request\APIRequest;

class CreateLegislacaoTipoAPIRequest extends APIRequest
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
        return LegislacaoTipo::$rules;
    }
}
