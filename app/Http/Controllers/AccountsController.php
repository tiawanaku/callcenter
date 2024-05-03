<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountsRegisterRequest;
use App\Http\Requests\AccountsAccountEditRequest;
use App\Http\Requests\AccountsAddRequest;
use App\Http\Requests\AccountsEditRequest;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Exception;
class AccountsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.accounts.list";
		$query = Accounts::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Accounts::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "accounts.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Accounts::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Accounts::query();
		$record = $query->findOrFail($rec_id, Accounts::viewFields());
		return $this->renderView("pages.accounts.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.accounts.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AccountsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("img", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['img'], "img");
			$modeldata['img'] = $fileInfo['filepath'];
		}
		$modeldata['password'] = bcrypt($modeldata['password']);
		
		//save Accounts record
		$record = Accounts::create($modeldata);
		$record->assignRole("User"); //set default role for user
		$rec_id = $record->id;
		return $this->redirect("accounts", "Grabar agregado exitosamente");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AccountsEditRequest $request, $rec_id = null){
		$query = Accounts::query();
		$record = $query->findOrFail($rec_id, Accounts::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("img", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['img'], "img");
			$modeldata['img'] = $fileInfo['filepath'];
		}
			$record->update($modeldata);
			return $this->redirect("accounts", "Registro actualizado con éxito");
		}
		return $this->renderView("pages.accounts.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Accounts::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Grabar eliminado con éxito");
	}
}
