<?php

require_once "conexion.php";

class mdlProductos {

    #       Agregar un Producto a la BD
    # ---------------------------------------------
    
    public static function mdlRegistraProducto($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `productos`(`idProducto`, `name`, `brand`, `eqType`, `dayPrice`, `weekPrice`, 
        `monthPrice`, `features`, `image`) 
        VALUES (NULL, :nombre, :brand, :eqType, :dayPrice, :weekPrice, :monthPrice, :features, :imagen)");
    
         $stmt -> bindParam(":nombre", $datos["name"], PDO::PARAM_STR);
         $stmt -> bindParam(":brand", $datos["brand"], PDO::PARAM_STR);
         $stmt -> bindParam(":eqType", $datos["eqType"], PDO::PARAM_STR);
         $stmt -> bindParam(":dayPrice", $datos["dayPrice"], PDO::PARAM_INT);
         $stmt -> bindParam(":weekPrice", $datos["weekPrice"], PDO::PARAM_INT);
         $stmt -> bindParam(":monthPrice", $datos["monthPrice"], PDO::PARAM_INT);
         $stmt -> bindParam(":features", $datos["features"], PDO::PARAM_STR);
         $stmt -> bindParam(":imagen", $datos["image"], PDO::PARAM_STR);
        
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }


	#       Actualiza la informacion de un Producto a la BD
    # ----------------------------------------------------------
    
    public static function mdlActualizaProducto($datos){

        $stmt = Conexion::conectar()->prepare("UPDATE `productos` SET `name`=:pName, `brand`=:brand,
		`eqType`=:eqType, `dayPrice`= :dayPrice, `weekPrice`= :weekPrice, `monthPrice`= :monthPrice, `features`=:features,
         `image`=:imagen WHERE idProducto = :idProducto;");

        $stmt -> bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);
        $stmt -> bindParam(":pName", $datos["name"], PDO::PARAM_STR);
        $stmt -> bindParam(":brand", $datos["brand"], PDO::PARAM_STR);
        $stmt -> bindParam(":eqType", $datos["eqType"], PDO::PARAM_STR);
        $stmt -> bindParam(":dayPrice", $datos["dayPrice"], PDO::PARAM_INT);
        $stmt -> bindParam(":weekPrice", $datos["weekPrice"], PDO::PARAM_INT);
        $stmt -> bindParam(":monthPrice", $datos["monthPrice"], PDO::PARAM_INT);
        $stmt -> bindParam(":features", $datos["features"], PDO::PARAM_STR);
        $stmt -> bindParam(":imagen", $datos["image"], PDO::PARAM_STR);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    	#LISTA ProductoS
	#-------------------------------------

	public static function mdlListaProducto($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		//$stmt->close();

	}


    	#BUSCA UN Producto
	#-------------------------------------

	public static function mdlBusca($usuario, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idProducto = :id");

		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		//$stmt->close();
	}

     	#Cambia Sustus de un producto 
	#-------------------------------------
	public static function mdlStatusProducto($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE `productos` SET `status` = :stat WHERE idProducto = :id");
		$stmt -> bindPARAM(":id",$datosModel["id"], PDO::PARAM_INT);
        $stmt -> bindPARAM(":stat",$datosModel["stat"], PDO::PARAM_STR);

		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
	}



    	#BORRAR Producto
	#-------------------------------------
	public static function mdlBorrarProducto($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idProducto = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		//$stmt -> close();
	}

	#----------------------------------------------------------------
	#  Lista el nombre de los productos registrados para un select
	#----------------------------------------------------------------

	public static function mdlListProductos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idProducto, name FROM $tabla ORDER BY name ASC");
		$stmt->execute();
		return $stmt->fetchAll();

	}
	#	----------------------------------------------------------------------------------------
	#	Busca los productos asociados a una ORDEN y los regresa como un JSON
	# 	----------------------------------------------------------------------------------------

	public static function mdlListProductosJSON($orden){
		$prodsArray = array();
		$stmt = Conexion::conectar()->prepare("SELECT e.*, p.name as producto
												FROM entradas AS e
												INNER JOIN productos AS p
												ON e.idProducto = p.idProducto WHERE orden = $orden");
		$stmt->execute();
        while($row=$stmt->fetchAll(PDO::FETCH_ASSOC)){
			$prodsArray = $row;
	  }
        return json_encode($prodsArray);
	}


	#	----------------------------------------------------------------------------------------
	#	Busca los productos asociados a un PEDIDO y los regresa como un JSON
	# 	----------------------------------------------------------------------------------------

	public static function mdlListProductosSalidaJSON($orden){
		$prodsArray = array();
		$stmt = Conexion::conectar()->prepare("SELECT s.*, p.name as producto
												FROM salidas AS s
												INNER JOIN productos AS p
												ON s.idProducto = p.idProducto WHERE pedido = $orden");
		$stmt->execute();
        while($row=$stmt->fetchAll(PDO::FETCH_ASSOC)){
			$prodsArray = $row;
	  }
        return json_encode($prodsArray);
	}


	public function mdlLiveSearch($nombres){

		//$stmt = Conexion::conectar()->prepare("SELECT * FROM productos WHERE name LIKE :nombres OR claveProducto LIKE :nombres");
		$stmt = Conexion::conectar()->prepare("SELECT e.*, p.name, p.dayPrice, p.weekPrice, p.monthPrice as producto
												FROM entradas AS e
												INNER JOIN productos AS p
												ON e.idProducto = p.idProducto WHERE (name LIKE :nombres OR claveProducto LIKE :nombres) 
												AND (e.disponible > 0)");
		
		$stmt -> execute(["nombres" => "%" . $nombres . "%"]);

		return $stmt -> fetchAll(PDO::FETCH_ASSOC);

	}


}// Class

?>