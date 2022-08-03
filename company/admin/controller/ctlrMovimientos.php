<?php
Class Movimientos {


    public static function ctrRegistraEntrada(){
        if(isset($_POST["nombre"])){

            // echo $_POST["nombres"]."<br>";
            // echo $_POST["apellidos"]."<br>";
            // echo $_POST["telefono"]."<br>";
            // echo $_POST["tipoCliente"]."<br>";
            // echo $_POST["fechaNacimiento"]."<br>";

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

            if ($ingresa == "ok"){

                    echo "<script>Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El nuevo usuario ha sio registrado',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='index.php?page=clientList'
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
                        window.location='index.php?page=clientList'
                    }
                  })
                  </script>";
        }
            
            
        }
    }

}

?>