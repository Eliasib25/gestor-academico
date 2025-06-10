<?php 

require_once(__DIR__ . "../components/conectmysql.php");

Class Student extends ConectarMysql {
    private $table = "students";

    function register(){
        $sql = "INSERT INTO ".$this->table. " VALUES ()" ;
    }

}

?>
