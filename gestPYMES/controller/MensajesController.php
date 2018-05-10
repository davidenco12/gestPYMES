<?php 
	session_start();

	class MensajesController extends ControladorBase{

		

		public function __construct(){
			parent::__construct();
		}
		
		public function crearMensaje(){

				$mensaje = new Mensaje(); //creo instancia de Mensaje

				// guardo lo que llega del formulario del comentario
				
				$fecha = date("d.m.y"). " a las " .date("g:i"); //cojo fecha y hora
				$nick = $_SESSION['usuarioLogueado'];
				$texto = $_POST['comentario'];
				$idMensaje = "";
				$destinatario = "";
				$publico = "si";

				
				// llamo a los setter de la instancia y les paso las variables del formulario

				$mensaje->setIdMensaje($idMensaje);
				$mensaje->setNick($nick);
				$mensaje->setFecha($fecha);
				$mensaje->setTexto($texto);
				$mensaje->setDestinatario($destinatario);
				$mensaje->setPublico($publico);

				$guardar = $mensaje->guardarMensaje();

				// redireccionamos al controlador Mensaje y metodo logueo
			 
				$this->redirect("Mensajes","logueo");
			
		}

		public function enviarMensajePrivado(){

				$mensaje = new Mensaje(); 

				// guardo lo que llega del formulario del comentario
				
				$fecha = date("d.m.y"). " a las " .date("g:i"); //cojo fecha y hora
				$nick = $_SESSION['usuarioLogueado']; //el que escribe el mensaje
				$texto = $_POST['mensajePrivado'];
				$idMensaje = "";
				$destinatario = $_POST['destinatario'];
				$publico = "no";

				
				// llamo a los setter de la instancia y les paso las variables del formulario
				$mensaje->setIdMensaje($idMensaje);
				$mensaje->setNick($nick);
				$mensaje->setFecha($fecha);
				$mensaje->setTexto($texto);
				$mensaje->setDestinatario($destinatario);
				$mensaje->setPublico($publico);

				$guardar = $mensaje->guardarMensajePrivado();



				// redirecciono al controlador Mensaje y metodo logueo
			 
				$this->redirect("Mensajes","logueo");
			
		}

		public function logueo(){
			$_SESSION['usuarioLogueado'];
			$_SESSION['passUsuarioLogueado'];
			
			$mensaje = new Mensaje(); 
			
			$allMesagges = $mensaje->getMesagges(); //consigo todos los mensajes



			// cargo la vista logueo y le pasamos valores
			$this->view("logueo", array(
				"allMesagges" => $allMesagges
				));
		}

		// redireccion a la vista modificar
		public function bandejaDeEntrada(){
			$_SESSION['usuarioLogueado'];
			$_SESSION['passUsuarioLogueado'];

			$mensaje = new Mensaje(); 
			
			$allMesagges = $mensaje->getMesaggesPrivates($_SESSION['usuarioLogueado']); //consigo todos los mensajes
			
			$this->view("bandejaDeEntrada", array(
				"allMesagges" => $allMesagges
				));
		}

	   

	}