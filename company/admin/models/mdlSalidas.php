<?php
class mdlSalidas {

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

    # ------------------------------------------------------------------------------------------
    #  Registra el encabezado de una pedido en la tabla de entradasEnc
    # ------------------------------------------------------------------------------------------

    public static function mdlRegistraPedido($datos_pedido){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `salidasEnc` (`id`, `idCliente`, `fecha`, `pedido`, `totalPedido`) 
        VALUES (NULL, :idCliente, :fechaMovimiento, :pedido, :totalPedido);");

         $stmt -> bindParam(":pedido", $datos_pedido["pedido"], PDO::PARAM_INT);         
         $stmt -> bindParam(":idCliente", $datos_pedido["idCliente"], PDO::PARAM_INT);
         $stmt -> bindParam(":totalPedido", $datos_pedido["totalPedido"], PDO::PARAM_INT);
        //  $stmt -> bindParam(":concepto", $datos_pedido["concepto"], PDO::PARAM_STR);
         $stmt -> bindParam(":fechaMovimiento", $datos_pedido["fechaMovimiento"], PDO::PARAM_STR);
        //  $stmt2 = Conexion::conectar()->prepare("UPDATE productos SET disponibilidad = (SELECT SUM(`cantidad`) FROM `entradas` WHERE `idProducto`= :idProducto) WHERE idProducto = :idProducto");
        //  $stmt2 -> bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);
         
        if ($stmt -> execute()){
                return "ok";
        }
        else {
            return "error_pedido";
        }
    }


    # ------------------------------------------------------------------------------------------
    #  Actualiza el encabezado de una pedido en la tabla de entradasEnc
    # ------------------------------------------------------------------------------------------

    public static function mdlActualizaPedido($datos_pedido){

        $stmt = Conexion::conectar()->prepare("UPDATE `salidasEnc` SET `idCliente` = :idCliente,  `fecha` = :fechaMovimiento, `totalPedido` = :totalPedidoBD  WHERE `pedido` = :pedido;");

         $stmt -> bindParam(":pedido", $datos_pedido["pedido"], PDO::PARAM_INT);         
         $stmt -> bindParam(":idCliente", $datos_pedido["idCliente"], PDO::PARAM_INT);
         $stmt -> bindParam(":totalPedidoBD", $datos_pedido["totalPedidoBD"], PDO::PARAM_INT);
        //  $stmt -> bindParam(":concepto", $datos_pedido["concepto"], PDO::PARAM_STR);
         $stmt -> bindParam(":fechaMovimiento", $datos_pedido["fechaMovimiento"], PDO::PARAM_STR);
        //  $stmt2 = Conexion::conectar()->prepare("UPDATE productos SET disponibilidad = (SELECT SUM(`cantidad`) FROM `entradas` WHERE `idProducto`= :idProducto) WHERE idProducto = :idProducto");
        //  $stmt2 -> bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);
         
        if ($stmt -> execute()){
                return "ok";
        }
        else {
            return "error_pedido";
        }
    }

    # ------------------------------------------------------------------------------------------
    #  Registra los productos de una pedido indivudualmente en la tabla de entradas 
    # ------------------------------------------------------------------------------------------

    public static function mdlRegistraProdsPedido($datos_prods){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `salidas` (`id`, `idProducto`, `cantidad`, `medida`, `lote`, `idCliente`, `precio`, `pedido`) 
        VALUES (NULL, :idProducto, :cantidad, :medida, :lote, :idCliente, :precio, :pedido);");
        
         $stmt -> bindParam(":idProducto", $datos_prods["idProducto"], PDO::PARAM_INT);
         $stmt -> bindParam(":cantidad", $datos_prods["cantidad"], PDO::PARAM_INT);
         $stmt -> bindParam(":medida", $datos_prods["medida"], PDO::PARAM_STR);
         $stmt -> bindParam(":lote", $datos_prods["lote"], PDO::PARAM_STR);
         $stmt -> bindParam(":idCliente", $datos_prods["idCliente"], PDO::PARAM_INT);
         $stmt -> bindParam(":precio", $datos_prods["precio"], PDO::PARAM_STR);
         $stmt -> bindParam(":pedido", $datos_prods["pedido"], PDO::PARAM_INT);

         //UPDATE entradas SET `disponible` = `disponible` - 25 WHERE `idProducto` = 38 AND `lote` = 1
         $stmt2 = Conexion::conectar()->prepare("UPDATE entradas SET `disponible` = `disponible` - :cantidad WHERE `idProducto` = :idProducto AND `lote` = :lote");
         $stmt2 -> bindParam(":idProducto", $datos_prods["idProducto"], PDO::PARAM_INT);
         $stmt2 -> bindParam(":lote", $datos_prods["lote"], PDO::PARAM_STR);
         $stmt2 -> bindParam(":cantidad", $datos_prods["cantidad"], PDO::PARAM_INT);


         $stmt3 = Conexion::conectar()->prepare("UPDATE productos SET disponibilidad = (SELECT SUM(`disponible`) FROM `entradas` WHERE `idProducto`= :idProducto) WHERE idProducto = :idProducto");
         $stmt3 -> bindParam(":idProducto", $datos_prods["idProducto"], PDO::PARAM_INT);
         
        if ($stmt -> execute()){
            if($stmt2 -> execute())
                if($stmt3 -> execute())
                return "ok";
        }
        else {
            return "error_prods";
        }
    }

    # ------------------------------------------------------------------------------------------
    # Elimina todos los productos relacionados con una pedido 
    # ------------------------------------------------------------------------------------------
    public static function mdlEliminaProds($pedido){
        $stmt = Conexion::conectar()->prepare("DELETE FROM salidas WHERE `pedido` = $pedido;");
        if($stmt->execute()){
            return "ok";
        }
        else{
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

	public static function mdlBuscaSalida($entrada, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE pedido = :id");

		$stmt->bindParam(":id", $entrada, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		//$stmt->close();
	}

    # ------------------------------------
    	#Lista Entradas
	#-------------------------------------

	public static function mdlListaSalidas($tabla){

		 $stmt = Conexion::conectar()->prepare("SELECT e.*, c.nombres, c.apellidos
                                                FROM salidasEnc AS e
                                                INNER JOIN clientes AS c
                                                ON e.idCliente = c.idCliente");

        //$stmt = Conexion::conectar()->prepare("SELECT * from $tabla order by pedido");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		//$stmt->close();

	}

    #-------------------------------------
    # Borrar Entrada de inventario
	#-------------------------------------
	public static function mdlBorrarSalida($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		//$stmt -> close();
	}

    #-------------------------------------
    # Borrar Entrada de inventario
	#-------------------------------------
	public static function mdlBorrarEncSalidas($datosModel){
		$stmt = Conexion::conectar()->prepare("DELETE FROM salidasEnc WHERE pedido = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);

        // este script busca las entradas correspondientes al pedido para devolver las cantidades corrrespondientes
        // a cada lote
        $stmt2 = Conexion::conectar()->prepare("UPDATE entradas e
                                                INNER JOIN salidas s ON e.idProducto = s.idProducto
                                                SET e.disponible = e.disponible + s.cantidad
                                                where e.lote = s.lote and s.pedido = :id");
		$stmt2 -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);


        $stmt3 = Conexion::conectar()->prepare("DELETE FROM salidas WHERE pedido = :id");
        $stmt3 -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);

        if ($stmt->execute()) $msg = 'success'; else $msg = 'Encabezado';
        if ($stmt2->execute()) $msg = 'success'; else $msg = 'Devolver';
        if ($stmt3->execute()) $msg = 'success'; else $msg = 'Salidas';

		return $msg;
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
