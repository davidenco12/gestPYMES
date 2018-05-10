	<?php 

	class Conectar{

		private $driver,$user,$pass,$database,$charset;

		public function __construct(){

			$db_config = require_once 'config/database.php'; //llamamos al array de database
			$this->driver = $db_config["driver"];
			$this->user = $db_config["user"];
			$this->pass = $db_config["pass"];
			$this->database = $db_config["database"];
			$this->charset = $db_config["charset"];
		}

		// el metodo conexion se encargará de conectarnos a la bbdd
		public function conexion(){
			// mysqli mas rapido
			// pdo,te abtrae de bbdd
				if($this->driver == "pdo" || $this->driver == null){
					// creamos la conexion
					$pdo = new PDO($this->database, $this->user, $this->pass);
					// $conexion = new PDO($this->host, $this->user, $this->pass, $this->database);
					// creamos consulta para setear el charset que vamos a utilizar
					// $conexion->query("SET NAMES '".$this->charset."'");
				}

				return $pdo;
		}




	}


	 ?>