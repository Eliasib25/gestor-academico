<?php 

    require_once("../components/conectmysql.php");

    Class User extends ConectarMysql {

        private $table = "users";
        public function save($id, $user="", $password="", $role="" ){
            $sql = "SELECT 1 FROM ". $this->table. " WHERE user = ?";
            $statement = $this->getconexion()->prepare($sql);
            $statement->bind_param("isss",$user);
            $statement->execute();
            $statement->get_result();
            if($statement->num_rows == 0){
                $sql = "INSERT INTO ".$this->table. " VALUES (?, ?, ?, ?)";
                $statement = $this->getconexion()->prepare($sql);
                $statement->bind_param("isss", $id, $user, $password, $role);
                $statement->execute();
            }
        }

        public function Login($user, $password) {
        $sql = "SELECT * FROM ". $this->table. " WHERE user = ? AND password = ?";
        $statement = $this->getconexion()->prepare($sql);
        $statement->bind_param("ss", $user, $password);
        $statement->execute();
        $result = $statement->get_result();

        if($result->num_rows > 0) {
            return $result;
        } else {
            return $result = null;
        }
    }

    }

?> 