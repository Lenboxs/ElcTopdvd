<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StaffFormRequest extends FormRequest
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
          //'active' => 'required',
          'name' => 'required',
          //'position' => 'required',
          //'image' => 'required'
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['name'] = filter_var( $input['name'], FILTER_SANITIZE_STRING );

        $input['position'] = filter_var( $input['position'], FILTER_SANITIZE_STRING );

        //$input['image'] = filter_var( $input['image'], FILTER_SANITIZE_STRING );

        $this->replace( $input );
    }
}
