<?php

class ConectarMysql{

private $conexion;

    function __construct(){
    require("../config/configurations.php");
    $this->conexion = mysqli_connect($host,$user,$password,$database,$port);
    }
    function getconexion(){
        return $this->conexion;
    }
}

?>