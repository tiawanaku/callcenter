<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesEditRequest extends FormRequest
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
            
				"nombre" => "nullable|string",
				"telefono" => "filled|string",
				"empresa" => "filled",
				"correo" => "nullable|string",
				"direccion" => "nullable|string",
				"monto" => "filled|numeric",
				"fechacarga" => "filled|date",
				"usuario" => "filled|numeric",
				"estado" => "nullable|string",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
