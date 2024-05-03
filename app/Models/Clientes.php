<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Clientes extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'clientes';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'nombre','telefono','empresa','correo','direccion','monto','fechacarga','usuario','estado'
	];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				id LIKE ?  OR 
				telefono LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"id",
			"nombre",
			"telefono",
			"empresa",
			"Monto AS monto",
			"FechaCarga AS fechacarga",
			"Usuario AS usuario" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id",
			"nombre",
			"telefono",
			"empresa",
			"Monto AS monto",
			"FechaCarga AS fechacarga",
			"Usuario AS usuario" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id",
			"nombre",
			"telefono",
			"empresa",
			"correo",
			"direccion",
			"Monto AS monto",
			"FechaCarga AS fechacarga",
			"Usuario AS usuario",
			"Estado AS estado" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id",
			"nombre",
			"telefono",
			"empresa",
			"correo",
			"direccion",
			"Monto AS monto",
			"FechaCarga AS fechacarga",
			"Usuario AS usuario",
			"Estado AS estado" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"nombre",
			"telefono",
			"empresa",
			"correo",
			"direccion",
			"Monto AS monto",
			"FechaCarga AS fechacarga",
			"Usuario AS usuario",
			"Estado AS estado",
			"id" 
		];
	}
}
