	<?php 

	// pequeños metodos que utilizaremos en las vistas
	// nos ayudara en varias tareas dentro de las vistas


	class AyudaVistas{

		// al pasar el nombre del controlador,va a pintar la url en un link
		public function url($controller = controller_default, $action = action_default){

			$urlString = "index.php?controller=".$controller."&action=".$action;

			return $urlString;
		}

	}

	?>