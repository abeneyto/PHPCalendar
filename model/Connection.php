<?php
/* Connection to BBDD*/
class Connection{
  public static function getConnection(){
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "test";
    $conn  =  new  mysqli($servername,  $user,$password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Error: " . $conn->connect_error);
    }
    if(!$conn->set_charset("utf8")){
      die("Error cargando el conjunto de caracteres");
    }
    $query = "SELECT nombre FROM equipos";
    $result = $conn->query ( $query );
    if (isset ( $result ) && $result) {
      return $result; 
    } else {
      echo "<h3>SE HA PRODUCIDO UN ERROR AL ACCEDER A LA BASE DE DATOS.</h3>";
    }
  }
}
?>
