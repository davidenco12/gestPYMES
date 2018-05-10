	<?php 

	// Heredara de entidad base,y a su vez,modelo base,heredaran tambien los modelos de consulta

	// permitirá utilizar el constructor de consultas que hemos incluido y también los métodos de EntidadBase, así como otros métodos que programemos dentro de la clase

	class ModeloBase extends EntidadBase{

		private $table;

		public function __construct($table,$adapter){
			$this->table = (string) $table;
			// $this->db=Conectar::conexion();
			parent::__construct($table,$adapter);//Herencia de EntidadBase
		}

		public function ejectSql($query){
			// sabra si la query devolvera uno(devolverá un objeto),o varios resultados(creara array de objetos y lo devolvera)

			$query = $this->db()->query($query);

			if($query == true){ //si no da NULL
				if($query->num_rows > 1){
					while ($fila = $query->fetch_object()) {
						$resultado[] = $fila;
					}
				}elseif($query->num_rows == 1){
					if($fila = $query->fetch_object()){
						$resultado = $fila;
					}
				}else{
					$resultado = true;
				}
			}else{
				$resultado = false;
			}

			return $resultado;
		}

	}


	 ?>