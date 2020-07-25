<?php
$db_host = "mysql:host=localhost; dbname=luks; charset=utf8mb4";
$db_user = "root";
$db_pass = "";

try{
	$base= new PDO($db_host,$db_user,$db_pass);
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
	echo "Fallo la conexion con la BBDD".$e->getMessage();;
}
?>