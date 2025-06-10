<?php 

require_once(__DIR__ . "/../components/conectmysql.php");

Class Student extends ConectarMysql {
    private $table = "students";

    public function register($identification, $identificationType, $name, $lastname, $dateBorn, $address, $identificationTypeAttendant, $identificationAttendant, $nameAttendant, $lastnameAttendant, $phone, $email, $gradesId){
        $sql = "INSERT INTO ".$this->table. " VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $statement = $this->getconexion()->prepare($sql);
        $statement->bind_param("ssssssssssssi", $identification, $identificationType, $name, $lastname, $dateBorn, $address, $identificationTypeAttendant, $identificationAttendant, $nameAttendant, $lastnameAttendant, $phone, $email, $gradesId);
        if ($statement->execute()){
            return "success";
        } else {
            return "error: ". $statement->error;
        }
    }

    public function searchOne($identification){
        $sql = "SELECT 1 FROM ".$this->table. " WHERE identification = ?";
        $statement = $this->getconexion()->prepare($sql);
        $statement->bind_param("s", $identification);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0){
            return $result->fetch_assoc();
        } else {
            return "userNotFound";
        }
    }

}

?>
