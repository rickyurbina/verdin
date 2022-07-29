<?php

class Conexion{

	public static function conectar(){
// conexion local -------------------------------
		$bd = "dc-supply";
		$servername = "localhost";
		$username = "root";
		$password = "12345678";

// conexion Server ------------------------------
		// $bd = "rickurbi_gym";
		// $servername = "mysql1007.mochahost.com";
		// $username = "rickurbi_gym";
		// $password = "4Jc^vfpsG4W6";

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo '<script>alert("Connection Seccess !");</script>';
		    }
		catch(PDOException $e)
		    {
		    echo '<script>alert("Connection failed: '.$e->getMessage().'");</script>';

		    }
		return $conn;

	}

}