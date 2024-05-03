<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Usuarios extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'usuarios';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'idus';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'usuario','password','email','telephone','profile','account_status'
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
				IdUs LIKE ?  OR 
				Usuario LIKE ?  OR 
				Email LIKE ?  OR 
				Telephone LIKE ?  OR 
				account_status LIKE ?  OR 
				Password LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"IdUs AS idus",
			"Usuario AS usuario",
			"Email AS email",
			"Telephone AS telephone",
			"Profile AS profile",
			"account_status" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"IdUs AS idus",
			"Usuario AS usuario",
			"Email AS email",
			"Telephone AS telephone",
			"Profile AS profile",
			"account_status" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"IdUs AS idus",
			"Usuario AS usuario",
			"Email AS email",
			"Telephone AS telephone",
			"Profile AS profile",
			"account_status" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"IdUs AS idus",
			"Usuario AS usuario",
			"Email AS email",
			"Telephone AS telephone",
			"Profile AS profile",
			"account_status" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"IdUs AS idus",
			"Usuario AS usuario",
			"Email AS email",
			"Telephone AS telephone",
			"Profile AS profile",
			"account_status" 
		];
	}
}
