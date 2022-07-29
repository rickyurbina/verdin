<?php
session_start();
class Ingreso{

	public static function ingresoController(){

		if(isset($_POST["usuarioIngreso"])){

				$userPass = $_POST["passwordIngreso"];

				$datosController = array("email"=>$_POST["usuarioIngreso"]);


				$respuesta = IngresoModels::ingresoModel($datosController, "socios");

				if (password_verify($userPass, $respuesta["password"] )) {
					$_SESSION["validar"] = true;
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["permisos"] = $respuesta["permisos"];
					$_SESSION["email"] = $respuesta["email"];
					$_SESSION["nombre"] = $respuesta["nombres"];
					$_SESSION["foto"] = $respuesta["foto"];
					//$_SESSION["perfil"] = $respuesta["perfil"];

					echo '<script>window.location="admin/index.php?page=products";</script>';
				} else {
					echo '<div class="w-100 form-control text-md-center"><span style="color: #f00">Verifique Usuario/Password</span></div>';
				}

		}// si se capturo usuarioIngreso

	} // function Ingreso

} //Class