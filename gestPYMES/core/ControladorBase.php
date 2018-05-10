	<?php 

	// heredan los controladores
	// caragara entidad y modelo base

	class ControladorBase{

		public function __construct(){

			require_once 'Conectar.php';
			require_once 'EntidadBase.php';
			require_once 'ModeloBase.php';

			/* carga de modelos
				cogemos todos los nombres de ficheros,e incluye el fichero que ha sacado
			*/

			foreach (glob("model/*.php") as $file) {
				require_once $file;
			}
		}

		public function view($vista, $datos){

			/*
	* Este método lo que hace es recibir los datos del controlador en forma de array
	* los recorre y crea una variable dinámica con el indice asociativo y le da el 
	* valor que contiene dicha posición del array, luego carga los helpers para las
	* vistas y carga la vista que le llega como parámetro. En resumen un método para
	* renderizar vistas.
	*/
			
			/*
				ejemplo:
				usuarios->$users

				RECORRE EL ARRAY,COGER EL INDICE,CREAR UNA VARIABLE CON EL NOMBRE DEL INDICE Y DARLE EL VALOR QUE TIENE ESA POSICION DEL ARRAY
				coge el id del array(usuarios)

				al llegar a la vista,tenemos disponible una variable con el id del elemento dentro del array
			*/

			foreach ($datos as $id_asociado => $valor) {
					${$id_asociado} = $valor;
			}

			require_once 'core/AyudaVistas.php';
			$helper = new AyudaVistas();
			require_once 'view/'.$vista.'View.php';
		}

		public function redirect($controller = controller_default, $action = action_default){

			header("Location:index.php?controller=".$controller."&action=".$action);
		}

		

	}



	 ?>