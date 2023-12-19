<?php
$servidor="mysql";
$baseDeDatos="appEmployee";
$usuario="manager";
$contrasena="manager_employee";

try {

  $concexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasena);
} catch (Exception $ex) {
  //throw $th;
  echo $ex->getMessage();
}

?>
