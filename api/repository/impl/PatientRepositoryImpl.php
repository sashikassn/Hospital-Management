<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/24/18
 * Time: 7:34 AM
 */
require_once __DIR__ . '/../PatientRepository.php';

class PatientRepositoryImpl implements PatientRepository

{
    private $connection;
    public function __construct()

    {
        $this->connection = (new DBConnection())->getConnection();
    }


    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function savePatient($id,$name,$gender,$address,$age)
    {
      $result = $this->connection->query("INSERT INTO Patient VALUES ('{$id}','{$name}','{$gender}','{$address}','{$age}')");
      echo $this->connection->error;
      return ($result && ($this->connection->affected_rows>0));
    }

    public function updatePatient($id, $name, $gender, $address, $age)
    {
        $result = $this->connection->query("UPDATE Patient SET name='{$name}',gender='{$gender}',address='{$address}',age='{$age}' WHERE patientid='{$id}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows>0));
    }

    public function deletePatient($id)
    {
        $result = $this->connection->query("DELETE from Patient WHERE patientid='{$id}'");
        return ($result && ($this->connection->affected_rows>0));
    }

    public function findPatient($id)
    {
       $resultset = $this->connection->query("SELECT * FROM Patient WHERE patientid='{$id}'");
       return $resultset->fetch_assoc();
    }

    public function findAllPatients()
    {
       $resultset = $this->connection->query("SELECT * FROM Patient");
       return $resultset->fetch_all(MYSQLI_ASSOC);

    }
}


