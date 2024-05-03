<?php 
namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components data Model
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Model
 */
class ComponentsData{
	

	/**
     * Check if value already exist in Accounts table
	 * @param string $value
     * @return bool
     */
	function accounts_user_name_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('accounts')->where('user_name', $value)->value('user_name');   
		if($exist){
			return true;
		}
		return false;
	}
	

	/**
     * Check if value already exist in Accounts table
	 * @param string $value
     * @return bool
     */
	function accounts_email_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('accounts')->where('email', $value)->value('email');   
		if($exist){
			return true;
		}
		return false;
	}
	

	/**
     * user_role_id_option_list Model Action
     * @return array
     */
	function user_role_id_option_list(){
		$sqltext = "SELECT role_id AS value, role_name AS label FROM roles";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
}
