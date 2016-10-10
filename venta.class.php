<?php
	class Tanques{
			//Empezamos con las variables públicas
		var $id="";
		var $unidades=1;
		var $nombre="";
		var $precio="";
			//Declarar los métodos públicos de la clase
			//Ahora creamos el constructor que recibe el ID
		function __construct($id){
			$this->id=$id;
			$this->unidades=1;
				//Necesitamos hacer '$conexion' global para poder recoger los datos que están en 'conexion.php'
			global $conexion;
				//Ahora toca recuperar la información de los tanques alojados en la BBDD
			$sql="SELECT * FROM tanques WHERE idtanque=$id";
			$consulta=$conexion->query($sql);
			$basedatos=$consulta->fetch_array();
				//Con los datos recogidos, ahora hay que asignarlos a mis variables
			$this->nombre=$basedatos["nombretanque"];
			$this->precio=$basedatos["precio"];
		}
			//Incrementamos el número de unidades del objeto
		function incrementa($n=1){
			$this->unidades+=$n;
		}
		function decrementa($n=1){
			if($this->unidades>0){
				$this->unidades-=$n;
			}else{
				$this->unidades=0;
			}			
		}
		function elimina(){
			$this->unidades=0;
		}
		function nombreTanques(){
			return $this->nombre;
		}
		function precioTanque(){
			return $this->precio;
		}
	}

	class Usuarios{
			//Crear variables públicas, a ver si consigo que me funcione la gestión de permisos
		var $nivel=0;
		var $idusuario="";

			//Declarar los métodos públicos y crear el contructor para recibir los "id" de los usuarios
		function __construct($idusuario){
			$this->idusuario=$idusuario;
			$this->nivel=0;

				//Hale, recupero la info de los usuarios
			$sql="SELECT * FROM usuarios WHERE id_usu=$idusuario";
			$consulta=$conexion->query($sql);
			$basedatos=$consulta->fetch_array();

				//Asignar los datos recogidos a mis variables
			$this->nivel=$basedatos["nivel"];
		}

			//Función para devolver los datos de nivel para el asunto de los permisos
		function dimeNivel(){
			return $this->nivel;
		}
	}
?>
