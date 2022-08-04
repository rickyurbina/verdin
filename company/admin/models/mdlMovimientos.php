<?php
class mdlMovimientos {

    # ---------------------------------------------
    #        Agregar una entrada de inventario 
    # ---------------------------------------------
    
    public static function mdlRegistraEntrada($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `entradas` (`id`,`idProducto`, `lote`, `cantidad`, `medida`, `idProveedor`, `costo`, `fecha`) 
        VALUES (NULL, :idProducto, :lote, :cantidad, :medida, :idProveedor, :costo, :fechaMovimiento);");
        
         $stmt -> bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);
         $stmt -> bindParam(":lote", $datos["lote"], PDO::PARAM_STR);
         $stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
         $stmt -> bindParam(":medida", $datos["medida"], PDO::PARAM_STR);
         $stmt -> bindParam(":idProveedor", $datos["idProveedor"], PDO::PARAM_INT);
         $stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
         $stmt -> bindParam(":fechaMovimiento", $datos["fechaMovimiento"], PDO::PARAM_STR);

         $stmt2 = Conexion::conectar()->prepare("UPDATE productos SET disponibilidad = (SELECT SUM(`cantidad`) FROM `entradas` WHERE `idProducto`= :idProducto) WHERE idProducto = :idProducto");
         $stmt2 -> bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);
         
        if ($stmt -> execute()){
            if($stmt2 -> execute())
                return "ok";
        }
        else {
            return "error";
        }
    }

    # ---------------------------------------------
    #        Actualizar una entrada de inventario 
    # ---------------------------------------------

    public static function mdlActualizaEntrada($datos){

        $stmt = Conexion::conectar()->prepare("UPDATE `entradas` SET `lote`= :lote, `cantidad`= :cantidad, `idProveedor`= :idProveedor , `fecha`= :fechaMovimiento , `costo`= :costo WHERE `id` = :id");
        
        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":lote", $datos["lote"], PDO::PARAM_STR);
         $stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
         //$stmt -> bindParam(":medida", $datos["medida"], PDO::PARAM_STR);
         $stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
         $stmt -> bindParam(":fechaMovimiento", $datos["fechaMovimiento"], PDO::PARAM_STR);
         $stmt -> bindParam(":idProveedor", $datos["idProveedor"], PDO::PARAM_INT);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    #-------------------------------------
    # Busca una entrada para edicion
	#-------------------------------------

	public static function mdlBuscaEntrada($entrada, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $entrada, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		//$stmt->close();
	}

    # ------------------------------------
    	#Lista Entradas
	#-------------------------------------

	public static function mdlListaEntradas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT e.*, p.name as producto, v.nombre as proveedor
                                                FROM entradas AS e
                                                INNER JOIN productos AS p
                                                    ON e.idProducto = p.idProducto
                                                INNER JOIN proveedores AS v
                                                    ON e.idProveedor = v.idProveedor");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		//$stmt->close();

	}

    #-------------------------------------
    # Borrar Entrada de inventario
	#-------------------------------------
	public static function mdlBorrarEntrada($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		//$stmt -> close();
	}

    #----------------------------------------------------------------
	#  Lista todos los proveedores registrados 
	#----------------------------------------------------------------

	public static function mdlListProveedores($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idProveedor, nombre FROM $tabla ORDER BY nombre ASC");
		$stmt->execute();
		return $stmt->fetchAll();

	}


} //class

?>
