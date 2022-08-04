<?php
Class Movimientos {


    public static function ctrRegistraEntrada(){
        if(isset($_POST["nombre"])){

            $original_date = $_POST["fechaMovimiento"];
            $timestamp = strtotime($original_date);
            $fechaMovimiento = date("Y-m-d", $timestamp);
            //$fechaMovimiento = date('Y-m-d');
        
            $datos = array("idProducto" => $_POST["idProducto"],
                           "lote" => $_POST["lote"],
                           "cantidad" => $_POST["cantidad"],
                           "medida" => $_POST["medida"],
                           "costo" => $_POST["costo"],
                           "idProveedor" => $_POST["idProveedor"],
                           "fechaMovimiento" => $fechaMovimiento);

            $ingresa = mdlMovimientos::mdlRegistraEntrada($datos);

            //echo $ingresa;

            if ($ingresa != "error"){

                    echo "<script>Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El nuevo usuario ha sio registrado ".$ingresa."',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='index.php?page=productList'
                        }
                      })
                      </script>";
            }
            else{

                echo "<script>Swal.fire({
                    title: 'Error',
                    text: 'No se pudo guardar la información',
                    icon: 'danger',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=productList'
                    }
                  })
                  </script>";
        }
            
            
        }
    }


    #  Lista todas las entradas de producto
    #------------------------------------------------------------------------------------------------
    public static function ctrListaEntradas(){

      $respuesta = mdlMovimientos::mdlListaEntradas("entradas");
  
      foreach ($respuesta as $row => $item){
              $registro = strftime("%d de %B de %Y", strtotime($item["fecha"]));
  
              echo '
              <tr>
                  <td>'.$item["producto"].'</td>
                  <td>'.$item["lote"].'</td>                 
                  <td>'.$item["cantidad"].' '.$item["medida"].'</td>                  
                  <td>'.$item["costo"].'</td>
                  <td>'.$registro.'</td>
                  <td>
                      <div class="item-action dropdown">
                          <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                          <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-172px, 22px, 0px); top: 0px; left: 0px; will-change: transform;">
                              <a href="index.php?page=entradaEdit&idEntrada='.$item["id"].'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>
                              <a href="index.php?page=entradasList&idBorrar='.$item["id"].'" class="dropdown-item"><i class="dropdown-icon fe fe-user-x"></i> Borrar </a>
                          </div>
                      </div>
                  </td>
              </tr>';
      }
    }


    #------------------------------------------------------------------
    # Edita la informacion de una Entrada
    #------------------------------------------------------------------
    public static function ctrActualizaEntrada(){
      if(isset($_POST["btnActualiza"])){

          $original_date = $_POST["fechaMovimiento"];
          $timestamp = strtotime($original_date);
          $fechaMovimiento = date("Y-m-d", $timestamp);
      
          $datos = array("id" => $_POST["id"],
                         "lote" => $_POST["lote"],
                         "cantidad" => $_POST["cantidad"],
                         "costo" => $_POST["costo"],
                         "fechaMovimiento" => $fechaMovimiento,
                         "idProveedor" => $_POST["idProveedor"]);

          $actualiza = mdlMovimientos::mdlActualizaEntrada($datos);

          if ($actualiza == "ok"){

              echo "<script>Swal.fire({
                  title: 'Actualizado!',
                  text: 'La información se actualizó correctamente',
                  icon: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Ok'
                  }).then((result) => {
                  if (result.isConfirmed) {
                      window.location='index.php?page=entradasList'
                  }
                  })
                  </script>";
          }else{
              echo "<script>Swal.fire({
                  title: 'Error!',
                  text: 'No se logró actualizar La información',
                  icon: 'error',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Ok'
                }).then((result) => {
                  if (result.isConfirmed) {
                      window.location='index.php?page=entradasList'
                  }
                })
                </script>";

          }
          
      }
  }

  #------------------------------------
    # Borrar Entrada
	#------------------------------------
	public static function ctrBorrarEntrada(){
		if (isset($_GET['idBorrar'])){
            echo '<script>  
            Swal.fire({
                title: "Esta seguro?",
                text: "Esto no se podrá recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, borrar!"
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location="index.php?page=entradaDel&idBorrar="+'.$_GET["idBorrar"].'
                }
              })
              </script>';
		}
    else{
      echo '<script>console.log("nada");</script>';
    }
	}


  #-------------------------------------------------------------------------
	# Lista proveedores en un select para el registro de entradas, recibe un valor
  # si coincide con la marca retorna selected para la edicion de la entrada
	#------------------------------------------------------------------------
	public static function ctlListProveedoresSelected($valor){

		$respuesta = mdlMovimientos::mdlListProveedores("proveedores");

		foreach ($respuesta as $row => $item){
            if ($item["idProveedor"] == $valor ) 
                echo  '<option value="'.$item["idProveedor"].'" selected>'.$item["nombre"].' </option>';    
            else 
                echo  '<option value="'.$item["idProveedor"].'">'.$item["nombre"].'</option>';
		}
	}

}

?>