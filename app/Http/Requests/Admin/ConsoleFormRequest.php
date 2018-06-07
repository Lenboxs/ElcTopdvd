<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TypeFormRequest extends FormRequest
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

          'name' => 'required',

        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['name'] = filter_var( $input['name'], FILTER_SANITIZE_STRING );

        $this->replace( $input );
    }
}
