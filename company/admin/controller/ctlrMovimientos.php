<?php
Class Movimientos {

    public static function ctlRegistraOrden(){
      if(isset($_POST["regOrden"])){
        
        $prods = json_decode($_POST["productosBD"], true);
        
        $original_date = $_POST["fechaMovimiento"];
        $timestamp = strtotime($original_date);
        $fechaMovimiento = date("Y-m-d", $timestamp);

        $datos_orden = array ("idProveedor" => $_POST["idProveedor"],
                                "orden" => $_POST["ordenNum"],
                                "concepto" => $_POST["concepto"],
                                "fechaMovimiento" => $fechaMovimiento);
        
        $ingresa = mdlMovimientos::mdlRegistraOrden($datos_orden);

        // por cada producto en la orden registro en la tabla de entradas
        foreach ($prods as $row => $item){
          $datos_prods = array( "idProducto" => $item["idProducto"],
                                "lote" => $item["lote"],
                                "cantidad" => $item["cantidad"],
                                "disponible" => $item["cantidad"],
                                "medida" => $item["medida"],
                                "costo" => $item["costo"],
                                "orden" => $_POST["ordenNum"]);
          // Mandar llamar el metodo del modelo que inserta los datos en la tabla 
          $ingresa = mdlMovimientos::mdlRegistraProdsOrden($datos_prods);
          // monitorear si hay error al insertar los datos y mostrar mensaje
        }

        if ($ingresa != 'error'){
          echo "<script>Swal.fire({
            title: 'Registro Exitoso',
            text: 'El nuevo usuario ha sio registrado',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location='index.php?page=entradasList'
            }
          })
          </script>";
        }
        else if($ingresa == 'error_orden'){
          echo "<script>Swal.fire({
            title: 'Error en Orden',
            text: 'No se pudo guardar la información de la Orden',
            icon: 'danger',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location='index.php?page=entradasList'
            }
          })
          </script>";
        }
        else if($ingresa == 'error_prods'){
          echo "<script>Swal.fire({
            title: 'Error en Productos',
            text: 'No se pudo guardar la información de los Productos',
            icon: 'danger',
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

    #--------------------------------------------------------------------------------------------------------
    # Actualiza los datos de ordenEnc y borra los datos de productos en entradas para despues volver a insertarlos
    #--------------------------------------------------------------------------------------------------------
    public static function ctlEditaOrden(){
      if(isset($_POST["updtOrden"])){
        
        $prods = json_decode($_POST["productosBD"], true);
        
        $original_date = $_POST["fechaMovimiento"];
        $timestamp = strtotime($original_date);
        $fechaMovimiento = date("Y-m-d", $timestamp);

        $datos_orden = array ("idProveedor" => $_POST["idProveedor"],
                                "orden" => $_POST["ordenNum"],
                                "concepto" => $_POST["concepto"],
                                "fechaMovimiento" => $fechaMovimiento);
        
        $ingresa = mdlMovimientos::mdlActualizaOrden($datos_orden);
        if ($ingresa != 'error'){
          $updtProds = mdlMovimientos::mdlEliminaProds($_POST['ordenNum']);
          if ($updtProds != "error"){
            // por cada producto en la orden registro en la tabla de entradas
            foreach ($prods as $row => $item){
              $datos_prods = array( "idProducto" => $item["idProducto"],
                                    "lote" => $item["lote"],
                                    "cantidad" => $item["cantidad"],
                                    "medida" => $item["medida"],
                                    "costo" => $item["costo"],
                                    "orden" => $_POST["ordenNum"]);
              // Mandar llamar el metodo del modelo que inserta los datos en la tabla 
              $ingresa = mdlMovimientos::mdlRegistraProdsOrden($datos_prods);
              // monitorear si hay error al insertar los datos y mostrar mensaje
            }
          }
        }

        if ($ingresa != 'error'){
          echo "<script>Swal.fire({
            title: 'Registro Exitoso',
            text: 'El nuevo usuario ha sio registrado',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location='index.php?page=entradasList'
            }
          })
          </script>";
        }
        else if($ingresa == 'error_orden'){
          echo "<script>Swal.fire({
            title: 'Error en Orden',
            text: 'No se pudo guardar la información de la Orden',
            icon: 'danger',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location='index.php?page=entradasList'
            }
          })
          </script>";
        }
        else if($ingresa == 'error_prods'){
          echo "<script>Swal.fire({
            title: 'Error en Productos',
            text: 'No se pudo guardar la información de los Productos',
            icon: 'danger',
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


    # Busca el numero de la ultima entrada/salida que esta registrada
    #------------------------------------------------------------------------------------------------
    public static function ctrSiguienteRegistro($tabla){
      if ($tabla == 'salidas') 
      {
        $tablaBuscar = 'salidasEnc';
        $campo = 'id';
      }
      elseif ($tabla == 'entradas') 
      {
        $tablaBuscar = 'entradasEnc';
        $campo = 'orden';
      }
      
      $ultimo = mdlMovimientos::mdlSiguienteRegistro($tablaBuscar, $campo);
      
      return $ultimo["siguiente"]+ 1;

    }


    #  Lista todas las entradas de producto
    #------------------------------------------------------------------------------------------------
    public static function ctrListaEntradas(){

      $respuesta = mdlMovimientos::mdlListaEntradas("entradasEnc");
  
      foreach ($respuesta as $row => $item){
              $registro = strftime("%d de %B de %Y", strtotime($item["fecha"]));
  
              echo '
              <tr>
                  <td>'.$item["orden"].'</td>
                  <td>'.$item["proveedor"].'</td>                 
                  <td>'.$item["concepto"].'</td>                  
                  <td>'.$registro.'</td>
                  <td>'.$item["concepto"].'</td>
                  <td>
                      <div class="item-action dropdown">
                          <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                          <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-172px, 22px, 0px); top: 0px; left: 0px; will-change: transform;">
                              <a href="index.php?page=entradasEdit&idEntrada='.$item["orden"].'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>
                              <a href="index.php?page=entradasList&idBorrar='.$item["orden"].'" class="dropdown-item"><i class="dropdown-icon fe fe-user-x"></i> Borrar </a>
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


  public static function ctlTraspasoPiezasAKilos($idProducto){
    $piezas = mdlMovimientos::mdlListProductosPiezas($idProducto);
    $kilos = mdlMovimientos::mdlListProductosKilos($idProducto);

    if (!$piezas && $idProducto != "0") 
    {
      echo '<div class="alert alert-primary" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                Este producto no tiene lotes en piezas! &nbsp;&nbsp;&nbsp;
              </div>';
    echo '<p>&nbsp;&nbsp;</p>';
    }
        
    if (!$kilos && $idProducto != "0") 
    {
      echo '<div class="alert alert-primary" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                  Este producto no tiene lotes en Kilos! &nbsp;&nbsp;&nbsp;
                </div>';
                echo '<p>&nbsp;&nbsp;<br></p>';
    }
    

    if ($piezas && $kilos){
      echo '<div class="card p-5">
                <h3>'.$piezas[0]["nombre"].'</h3><br>
                <form method="POST">
                <div class="row">
                <input type="text" class="form-control" name="idProducto" value="'.$idProducto.'" hidden>
                
                    <div class="col-xl-6 col-lg-6 col-md-8">   
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lotes en Piezas </h3>
                        </div>
                        <div class="card-body">
                          <div class="row">
                              
                              <div class="col-sm-4 col-md-4">
                                  <div class="form-group">
                                      <label class="form-label">Lote</label>
                                      <select class="form-control" name="lotePzas">';
                                      foreach ($piezas as $pieza) {
                                          echo '
                                              <option value="' . $pieza['lote'] . '" disponible="' . $pieza['disponible'] . '"> Lote ' . $pieza['lote'] . ' - Disp ' .$pieza['disponible'] . '</option>
                                          ';
                                      }
                                      echo '</select>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-4">
                                  <div class="form-group">
                                      <label class="form-label">Cantidad pzas</label>
                                      <input type="text" class="form-control" name="cantPiezas" value="0" required>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">kgs por pza</label>
                                      <input type="text" class="form-control" name="proporcion" value="" required>
                                  </div>
                              </div>
                              
                          </div>
                        </div>
                      </div>
                    </div> 
                    <div class="col-xl-6 col-lg-6 col-md-8">    
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lotes en Kilos</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-sm-5 col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Lote</label>
                                        <select class="form-control" name="loteKilos">';
                                          foreach ($kilos as $kilo) {
                                              echo '
                                                  <option value="' . $kilo['lote'] . '" disponible="' . $kilo['disponible'] . '"> Lote ' . $kilo['lote'] . ' - Disp ' .$kilo['disponible'] . '</option>
                                              ';
                                          }
                                        echo '</select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> 
                </div>
                <div class="card-footer text-right">
                    <button type="submit" name="traspasar" id="btnTransferir" class="btn btn-blue">Transferir</button>
                </div>
                </form>
                
                
            
            </div>';
    }
    
  }

  public static function ctlTraspaso(){
    $traspaso = "";
    if (isset($_POST["traspasar"]))
      {
        if (isset($_POST["lotePzas"]) && isset($_POST["cantPiezas"]) && isset($_POST["proporcion"]) && isset($_POST["loteKilos"]) ){

          $kilosTraspasar = $_POST["cantPiezas"] * $_POST["proporcion"];

          $datos = array (
                      "idProducto" => $_POST["idProducto"],
                      "desde" => $_POST["lotePzas"],
                      "piezasMenos" => $_POST["cantPiezas"],
                      "para" => $_POST["loteKilos"],
                      "cantidad" => $kilosTraspasar
          );

          $traspaso = mdlMovimientos::mdlTraspaso($datos);
    
        }
        // else if($idProducto != "0"){
        //   // echo '<div class="alert alert-primary" role="alert">
        //   //       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        //   //       Faltan datos para realizar la operación
        //   //     </div>';
        //   //$traspaso = "error";
        // }
      }

      if($traspaso == "ok")
      {
        echo "<script>Swal.fire({
            title: 'Traspaso Exitoso',
            text: 'se realizó el traspaso con exito',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location='index.php?page=traspasos'
            }
          })
          </script>";
        }
        else if($traspaso == "error")
        {
            echo "<script>Swal.fire({
                title: 'Error',
                text: 'No se pudo guardar la información',
                icon: 'danger',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location='index.php?page=traspasos'
                }
              })
              </script>";
        }

    

  }

}

?>