<?php 

    require_once("../components/conectmysql.php");

    Class User extends ConectarMysql {

        private $table = "users";
        public function save($id, $user="", $password="", $role="" ){
            $sql = "SELECT 1 FROM ". $this->table. " WHERE user = ?";
            $statement = $this->getconexion()->prepare($sql);
            $statement->bind_param("s",$user);
            $statement->execute();
            $result = $statement->get_result();
            if($result->num_rows == 0){
                $sql = "INSERT INTO ".$this->table. " VALUES (?, ?, ?, ?)";
                $statement = $this->getconexion()->prepare($sql);
                $statement->bind_param("isss", $id, $user, $password, $role);
                $statement->execute();
                $result = $statement->get_result();
            } else {
                return "user existt";
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

    public function searchOne($user){
        $sql = "SELECT * FROM ".$this->table. " WHERE user = ?";
        $statement = $this->getconexion()->prepare($sql);
        $statement = bind_param("s", $user);
        $statement->execute();
        $result = $statement->get_result();

        if($result->num_rows > 0) {
           return $result; 
        } else {
            return "User not found";
        } 
    }

    }

?> 