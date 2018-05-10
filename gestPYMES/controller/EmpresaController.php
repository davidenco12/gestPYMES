<?php 
//session_start();


class EmpresaController extends ControladorBase{

	public function __construct(){
			parent::__construct();
	}


	public function prueba(){
			$empleado = new Empleado(); 
			
			$allEmpleados = $empleado->getEmpleados(); //consigo todos los mensajes
			$this->view("sancionar", array(
						"allEmpleados" => $allEmpleados
						));
		
	}

	public function sancionarEmpleado(){

		$empleado = new Empleado();

		$empleadoSancionar = $_POST["empleadoAsancionar"];
		$motivo = $_POST["motivoSancion"];

						$empleado->setNombre($empleadoSancionar);

	}

	
		//va al formulario para registrar la empresa 
		public function irAformCrearEmpresa(){
			// cargamos la vista del formulario de registro de empresa view/crearEmpresaView.php
				$this->view("crearEmpresa", array());
		}
		public function irAformRegistrarEmpleado(){
			// cargamos la vista del formulario de registro de empresa view/crearEmpresaView.php
				$this->view("crearEmpleado", array());
				
		}

		public function volverIndex(){
			$this->view("index", array());
		}

		public function volverLogueo(){
			$this->view("volverLogueo", array());
		}

		public function registrarEmpresa(){

			if($_POST['registrarEmpresa']){
				$empresa = new Empresa(); //creo instancia de Empresa

				// guardo lo que llega del formulario de registro de empresa
				
				$idEmpresaRepetido = true;
				$fechaCreacion = date("d.m.y");
				$tipoEmpresa = $_POST['tipoEmpresa'];
				$capitalSocial = $_POST['capitalSocial'];
				$sector = $_POST['sector']; 
				$gerente = $_POST['gerente'];
				$pass = $_POST['pass'];
				$logo = $_POST['logo'];
				

				while ($idEmpresaRepetido == true) {
					$idEmpresa = mt_rand(1,100000);
					$empresa->setIdEmpresa($idEmpresa); 
					$idRegistroEmpresa = $empresa->getIdEmpresa();
					$idEmpresaBaseDatos = $empresa->comprobarIdEmpresa($idRegistroEmpresa);

					if($idRegistroEmpresa == $idEmpresaBaseDatos[0]){
						$idEmpresaRepetido = true;
					}else{
						$idEmpresaRepetido = false;
					}
				}
				
				 
				$empresa->setGerente($gerente); //seteo el idUsuario
				$empresaQueSolicitaRegistrarse = $empresa->getGerente(); //lo recojo
				$empresaEnBaseDeDatos = $empresa->loguearEmpresa($empresaQueSolicitaRegistrarse); //consulto a la base de datos el idUsuario introducido por el usuario
				
					if($empresaQueSolicitaRegistrarse == $empresaEnBaseDeDatos[0]){
						?>
						<script type="text/javascript">
							alert("La empresa que intentas registrar ya existe")
						</script>
						<?php  
						$this->view("crearEmpresa", array(
						));
					}else{

				
						// llamo a los setter de la instancia y les paso las variables del formulario
						$empresa->setFechaCreacion($fechaCreacion);
						$empresa->setTipoEmpresa($tipoEmpresa);
						$empresa->setCapitalSocial($capitalSocial);
						$empresa->setSector($sector);
						$empresa->setGerente($gerente);
						$empresa->setPass($pass);
						$empresa->setLogo($logo);
						$empresa->setIdEmpresa($idRegistroEmpresa);
						$guardar = $empresa->guardarEmpresa();

						// muestro la vista de REGISTRO OK
						?>
						<script type="text/javascript">
							alert("Su empresa se ha registrado correctamente\nAhora puede iniciar sesion")
						</script>
						<?php 
						$this->view("index", array(
						));
					}
			}
			
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

		
	

	public function index(){
			// cargamos la vista index y le pasamos valores
			$this->view("index", array());
	}

	

	public function irAformLogueo(){
		// cargamos la vista del formulario de registro de empresa view/crearEmpresaView.php
			$this->view("loguearCuenta", array());
	}

	// **********FUNCION DE REGISTRO EMPRESA**********
		public function registro(){
			$empresa = new Empresa(); //creamos instancia

			$allCompany = $empresa->getAll(); //conseguimos todas los empresas

			// la vista con el nombre index,y le pasamos un array cone l primer indice allusers,que va a ser la variable etc...

			// cargamos la vista registro y le pasamos valores
			$this->view("registro", array(
				"allCompany" => $allCompany,
				"prueba" => "esto es una prueba MVC"

				));
		}

		

		

		public function loguearCuenta(){

			$empresa = new Empresa();

				$usuario = $_POST['nombre-login']; //es el correo electronico
				$pass = $_POST['clave-login'];

				$empresa->setGerente($usuario); //seteo el idUsuario
				$empresaQueSolicitaLoguearse = $empresa->getGerente(); //lo recojo
				$empresaEnBaseDeDatos = $empresa->loguearEmpresa($empresaQueSolicitaLoguearse); //consulto a la base de datos el idUsuario introducido por el usuario

					if($empresaQueSolicitaLoguearse == $empresaEnBaseDeDatos[0] && $pass == $empresaEnBaseDeDatos[1]){

						
						$_SESSION['gerente'] = $empresaEnBaseDeDatos[0]; //guardo el usuario
						$_SESSION['passGerente'] = $empresaEnBaseDeDatos[1]; //guardo el pass
						$_SESSION['idEmpresa'] = $empresaEnBaseDeDatos[2]; //guardo idEmpresa
						
						// redireccciono al controlador y el metodo logueo
						//$this->redirect("Empresa","logueo");

						// cargamos la vista registro y le pasamos valores
						$this->view("logueo", array());
					}else{
								
							//redireccciono al controlador y el metodo logueoNotFound
							$this->view("logueoNotFound", array());
					}
		}

		public function logueo(){
			session_start();
			$_SESSION['gerente'];
			$_SESSION['passGerente'];


			// cargamos la vista registro y le pasamos valores
			$this->view("logueo", array());
		}
		
}

// public function controlClick(){

		

		
// 		//voy a la vista loguearCuenta
// 		if($_POST['irAformLogueo']){ //boton en indexView
// 			$this->redirect("Empresa","irAformLogueo");
// 		}

// 		if($_POST['loguearse']){
// 			$this->redirect("Empresa","loguearCuenta");
// 		}

// 		if($_POST['cerrarSesion']){ //cierra sesion y vuelve a index
// 				session_destroy();
// 			 	$this->redirect("Empresa","index");
// 		}

// 		if($_POST['volverIndex']){ //boton en indexView
// 			$this->redirect("Empresa","index");
// 		}
// 	}


 ?>