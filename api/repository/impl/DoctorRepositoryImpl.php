<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:42 PM
 */

require_once __DIR__ . '/../DoctorRepository.php';

class DoctorRepositoryImpl implements DoctorRepository
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

    public function saveDoctor($id, $name, $address,$special)
    {
        $salary = 10000;
        $result = $this->connection->query("INSERT INTO Doctor VALUES ('{$id}','{$name}','{$address}','{$special}')");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateDoctor($id, $name, $address,$special)
    {
        $result = $this->connection->query("UPDATE Doctor SET docname='{$name}', address='{$address}', Specialized_in='{$special}' WHERE docid='{$id}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deleteDoctor($id)
    {
        $result = $this->connection->query("DELETE FROM Doctor WHERE docid='{$id}'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function findDoctor($id)
    {
        $resultset = $this->connection->query("SELECT * FROM Doctor WHERE docid='{$id}'");
        return $resultset->fetch_assoc();
    }

    public function findAllDoctors()
    {
        $resultset = $this->connection->query("SELECT * FROM Doctor");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }

}