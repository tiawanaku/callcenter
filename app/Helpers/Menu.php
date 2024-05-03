
<?php
	class Menu{
		
	public static function navbarsideleft(){
		return [
		[
			'path' => 'home',
			'label' => "Home", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'accounts',
			'label' => "Accounts", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'clientes',
			'label' => "Clientes", 
			'icon' => '<i class="material-icons">extension</i>'
		]
	] ;
	}
	
		
	public static function empresa(){
		return [
		[
			'value' => 'Tigo', 
			'label' => "Tigo", 
		],
		[
			'value' => 'Entel', 
			'label' => "Entel", 
		],] ;
	}
	
	}
