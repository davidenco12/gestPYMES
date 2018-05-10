	<?php 

	// clase de la cual heredara los modelos que representen entidades de la bbdd
	// cada tabla es una entidad(usuarios,mensajes...) 

	// de esta clase heredarán los modelos que representen entidades, en el constructor le pasaremos el nombre de la tabla y tendremos tantos métodos como queramos para ayudarnos con las peticiones a la BD a través de los objetos que iremos creando. Lo bueno que tiene es que estos métodos pueden ser reutilizados en otras clases ya que le indicamos la tabla en el constructor.


	// las entidades que creemos,que seran modelos de tipo entidad
	class EntidadBase{

		private $table, $db, $conectar;

		public function __construct($table){
			$this->table = (string) $table;

			 require_once 'Conectar.php';
			 $this->conectar = new Conectar();
			 $this->db = $this->conectar->conexion();

			// $this->conectar = null;
	  //       $this->db = $adapter;
		}


		public function getConectar(){
			// saca la conexion de la bbd de otros sitios que le llamemos
			return $this->conectar;

		}

		public function db(){
			// se podrá usar en las entidades que creemos
			return $this->db;

		}
		public function getEmpleados(){
			// consulta la tabla que le pasamos ordenado por el id
			$query = $this->db->prepare("SELECT * FROM $this->table");
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_OBJ);
			return $resultado;

		}
		// public function getAll(){
		// 	// consulta la tabla que le pasamos ordenado por el id
		// 	$query = $this->db->prepare("SELECT * FROM $this->table ORDER BY nick DESC");

		// 	$query->execute();
		// 	$resultado = $query->fetchAll(PDO::FETCH_OBJ);
		// 	return $resultado;

		// }

		

		// public function getMesagges(){
		// 	// consulta la tabla que le pasamos ordenado por el id
		// 	$query = $this->db->prepare("SELECT * FROM $this->table WHERE publico = 'si' ORDER BY idMensaje DESC");
		// 	$query->execute();
		// 	$resultado = $query->fetchAll(PDO::FETCH_OBJ);
		// 	return $resultado;

		// }

		// public function getMesaggesPrivates($nick){
		// 	// consulta la tabla que le pasamos ordenado por el id
		// 	$query = $this->db->query("SELECT * FROM $this->table WHERE publico = 'no' AND destinatario = '".$nick."'");

		// 	$query->execute();
		// 	$resultado = $query->fetchAll(PDO::FETCH_OBJ);

		// 	if(empty($resultado)){
		// 		$resultado = "<font color='red'><b>¡NO TIENES MENSAJES PRIVADOS!</b></font";
		// 	}
		// 	// devolvemos el array del resultado
		// 	return $resultado;

		// }



		// public function getById($id){

		// 	$query = $this->db->query("SELECT idUsuario FROM $this->table WHERE idUsuario = $id");

		// 	// como solamente tiene que devolver un resultado,no recorremos con bucle

		// 	if($fila = $query->fetch_object()){
		// 		$resultado = $fila;
		// 	}

		// 	return $resultado; //devuelve un objeto
		// }

		// public function getBy($columna, $valor){
		// 	$query = $this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

		// 	while($fila = $query->fetch_object()){
		// 		// mientras se encuentren resultador de la consulta,los guardaremos en un array de objetos
		// 		$resultado[] = $fila;
		// 	}
		// 	// devolvemos el array del resultado
		// 	return $resultado;


		// }


		// public function deleteById($id){
		// 	$query = $this->db->query("DELETE FROM $this->table WHERE id=$id");
		// 	return $query;
		// }

		// public function deleteBy($column, $value){
		// 	$query = $this->db->query("DELETE FROM $this->table WHERE $column ='$value'");
		// 	return $query;
		// }



	}



	 ?>