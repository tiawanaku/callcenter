<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesAddRequest extends FormRequest
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
				"telefono" => "required|string",
				"empresa" => "required",
				"correo" => "nullable|string",
				"direccion" => "nullable|string",
				"monto" => "required|numeric",
				"fechacarga" => "required|date",
				"usuario" => "required|numeric",
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
