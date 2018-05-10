	<?php 

	/* tiene las funciones que se encargan de cargar un controlador u otro 
	y una acción u otra en función de lo que se le diga por la url.
	*/

	function cargarControlador($controller){

		// Se encarga de cargar un controlador u otro o una accion u otra,en funcion de lo que se le pase por la ulr

		$controller = ucwords($controller).'Controller'; //pasamos nombre de controlador
		$fileController = 'controller/'.$controller.'.php';

		if (!is_file($fileController)) { //carga el fichero
		 	$fileController = 'controller/'.ucwords(controller_default).'Controller.php';
		 } 

		 require_once $fileController;
		 // llamamos al objeto(controlador) y lo devolvemos
		 $controllerObj = new $controller();
		 return $controllerObj;

	}


	function cargarAccion($controllerObj, $action){
		// del objeto que llega llamamos al metodo de la accion que le estamos pasando

		// por la ulr le pedimos usuarios y listar por ejemplo,lo cargara
		$accion = $action;
		$controllerObj->$accion();
		// call_user_func(array($controllerObj, $accion));
	}

	function lanzarAccion($controllerObj){

		// si existe la variable get[action] y existe el metodo dentro del objeto(cargara el metodo si existe,si no,cargara el action por defecto definidio antes config/global.php )
		if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
			cargarAccion($controllerObj, $_GET["action"]);
		}else{
			cargarAccion($controllerObj, action_default); //llama a la constante creada anteriormente en global.php
		}
	}



	 ?>