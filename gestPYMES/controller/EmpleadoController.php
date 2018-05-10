	<?php 


	class UsuariosController extends ControladorBase{

		

		public function __construct(){
			parent::__construct();
		}

		

		public function index(){
			// cargamos la vista index y le pasamos valores
			$this->view("index", array());
		}

	// **********FUNCIONES DE REGISTRO**********
		/*public function registro(){
			$usuario = new Usuario(); //creamos instancia

			$allUsers = $usuario->getAll(); //conseguimos todos los usuarios

			// la vista con el nombre index,y le pasamos un array cone l primer indice allusers,que va a ser la variable etc...

			// cargamos la vista registro y le pasamos valores
			$this->view("registro", array(
				"allUsers" => $allUsers,
				"prueba" => "esto es una prueba MVC"

				));
		}*/

		public function loguearCuenta(){

			$empleado = new Empleado();

				$correo = $_POST['idEmpleado']; //es el correo electronico
				$pass = $_POST['pass'];

				$empresa->setGerente($usuario); //seteo el idUsuario
				$empresaQueSolicitaLoguearse = $empresa->getGerente(); //lo recojo
				$empresaEnBaseDeDatos = $empresa->loguearEmpresa($empresaQueSolicitaLoguearse); //consulto a la base de datos el idUsuario introducido por el usuario

					if($empresaQueSolicitaLoguearse == $empresaEnBaseDeDatos[0] && $pass == $empresaEnBaseDeDatos[1]){

						session_start();
						$_SESSION['gerente'] = $empresaEnBaseDeDatos[0]; //guardo el usuario
						$_SESSION['passGerente'] = $empresaEnBaseDeDatos[2]; //guardo el pass
							
						
						// redireccciono al controlador y el metodo logueo
						$this->redirect("Empresa","logueo");
					}else{
								
							//redireccciono al controlador y el metodo logueoNotFound
							$this->redirect("Empresa","logueoNotFound");
					}
		}



		



		
	// **********************************************************************************
		public function irAformRegistrarEmpleado(){
			// cargamos la vista del formulario de registro de empresa view/crearEmpresaView.php
				//$this->view("crearEmpleado", array());
			
			$this->view("crearEmpleado", array());
		}
		public function registrarEmpleado(){

				$empleado = new Empleado(); //creo instancia de Usuario

				// guardo lo que llega del formulario de registro
				$idEmpleado = 0000;
				$nombreEmpleado = $_POST['nombreEmpleado'];
				$apellidoEmpleado = $_POST['apellidoEmpleado'];
				$dniEmpleado = $_POST['dniEmpleado'];
				$passEmpleado = $_POST['passEmpleado'];
				$fechaNacimientoEmpleado = $_POST['fechaNacimientoEmpleado'];
				$localidadEmpleado = $_POST['localidadEmpleado'];
				$provinciaEmpleado = $_POST['provinciaEmpleado'];
				$calleEmpleado = $_POST['calleEmpleado'];
				$numeroEmpleado = $_POST['numeroEmpleado'];
				$pisoEmpleado = $_POST['pisoEmpleado'];
				$letraEmpleado = $_POST['letraEmpleado'];
				$cpEmpleado = $_POST['cpEmpleado'];
				$numeroEmpleado = $_POST['numeroEmpleado'];
				$numSanciones = 0;
				$fechaAlta = date("d.m.y"); 

				
				// llamo a los setter de la instancia y les paso las variables del formulario
				$empleado->setIdEmpleado($idEmpleado);
				$empleado->setNombre($nombreEmpleado);
				$empleado->setApellidos($apellidoEmpleado);
				$empleado->setDni($dniEmpleado);
				//$empleado->setPass($passEmpleado);
				$empleado->setFechaNacimiento($fechaNacimientoEmpleado);
				$empleado->setLocalidad($localidadEmpleado);
				$empleado->setProvincia($provinciaEmpleado);
				$empleado->setCalle($calleEmpleado);
				$empleado->setNumero($numeroEmpleado);
				$empleado->setPiso($pisoEmpleado);
				$empleado->setLetra($letraEmpleado);
				$empleado->setCp($cpEmpleado);
				$empleado->setIdEmpresa($_SESSION['idEmpresa']);
				$empleado->setNumSanciones($numSanciones);
				$empleado->setFechaAlta($fechaAlta);
				

				$guardar = $empleado->registrarEmpleado();

				// redireccionamos al controlador usuarios y metodo registroOk
			 	?>
						<script type="text/javascript">
							alert("Empleado registrado con éxito!")
						</script>
						
						<?php 
						$this->view("logueo", array(
						));
						
			
		}
	// **********FUNCIONES DE LOGIN**********
		

		public function loguear(){

			$usuario = new Usuario();

				$idUsuario = $_POST['idUsuario']; //es el correo electronico
				$pass = $_POST['pass'];

				$usuario->setIdUsuario($idUsuario); //seteo el idUsuario
				$usuarioQueSolicitaLoguearse = $usuario->getIdUsuario(); //lo recojo
				$usuarioEnBaseDeDatos = $usuario->loguearUsuario($usuarioQueSolicitaLoguearse); //consulto a la base de datos el idUsuario introducido por el usuario

					if($usuarioQueSolicitaLoguearse == $usuarioEnBaseDeDatos[0] && $pass == $usuarioEnBaseDeDatos[1]){

						session_start();
						$_SESSION['idUsuario'] = $usuarioEnBaseDeDatos[0]; //guardo el nick
						$_SESSION['usuarioLogueado'] = $usuarioEnBaseDeDatos[2]; //guardo el nick
						$_SESSION['passUsuarioLogueado'] = $usuarioEnBaseDeDatos[1]; //guardo el pass
							
						
						// redireccciono al controlador y el metodo logueo
						$this->redirect("Usuarios","logueo");
					}else{
								
							//redireccciono al controlador y el metodo logueoNotFound
							$this->redirect("Usuarios","logueoNotFound");
					}
		}

		

		public function logueo(){
			session_start();
			$_SESSION['usuarioLogueado'];
			$_SESSION['passUsuarioLogueado'];
			$mensaje = new Mensaje(); //creamos instancia

			$allMesagges = $mensaje->getMesagges(); //conseguimos todos los usuarios


			// cargamos la vista registro y le pasamos valores
			$this->view("logueo", array(
				"allMesagges" => $allMesagges));
		}
		public function logueoFail(){
			$this->view("logueoFail", array());
		}
		public function logueoNotFound(){
			$this->view("logueoNotFound", array());
		}

		// **********FUNCIONES DE MODIFICAR**********

		// redireccion a la vista modificar
		public function modificar(){
			session_start();
			$_SESSION['usuarioLogueado'];
			$_SESSION['passUsuarioLogueado'];
			// cargamos la vista index y le pasamos valores
			$this->view("modificar", array());
		}

		// public function cambiarCorreo(){
		// 	session_start();
		// 	$_SESSION['usuarioLogueado'];
		// 	$_SESSION['passUsuarioLogueado'];

		// 	$usuario = new Usuario();

		// 		$idUsuario = $_POST['correoNuevo']; //correo que nos llega
		// 		$nick = $_SESSION['usuarioLogueado']; //cojo el nick para el where de la consulta

		// 		$correoNuevo = $usuario->actualizarCorreo($idUsuario, $nick);
		// 	// cargamos la vista index y le pasamos valores
		// 	$this->redirect("Usuarios","correoOk");
		// }

		// public function cambiarNick(){
		// 	session_start();
		// 	$_SESSION['usuarioLogueado'];
		// 	$_SESSION['passUsuarioLogueado'];

		// 	$usuario = new Usuario();

		// 		$idUsuario = $_SESSION['idUsuario']; //correo que nos llega
		// 		$nickNuevo = $_SESSION['nickNuevo']; //cojo el nick para el where de la consulta

		// 		$passNuevo = $usuario->actualizarNick($idUsuario, $nickNuevo);
		// 	// cargamos la vista index y le pasamos valores
		// 	$this->redirect("Usuarios","nickOk");
		// }

		public function correoOk(){

			// la vista con el nombre index,y le pasamos un array con el primer indice allusers,que va a ser la variable etc...

			// cargamos la vista registro y le pasamos valores
			$this->view("correoOk", array(
				));
		}

		public function nickOk(){

			// la vista con el nombre index,y le pasamos un array con el primer indice allusers,que va a ser la variable etc...

			// cargamos la vista registro y le pasamos valores
			$this->view("nickOk", array(
				));
		}
	

	}


	 ?>