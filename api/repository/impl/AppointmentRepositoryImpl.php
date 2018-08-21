<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/26/18
 * Time: 6:12 AM
 */

require_once __DIR__ . '/../AppointmentRepository.php';


class AppointmentRepositoryImpl implements AppointmentRepository
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

    public function saveAppointment($appoid, $docid, $patientid, $date)
    {
        $result = $this->connection->query("INSERT INTO Appointment VALUES ('{$appoid}','{$docid}','{$patientid}','{$date}')");

        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateAppointment($appoid, $docid, $patientid, $date)
    {
        $result = $this->connection->query("UPDATE Appointment set docid='{$docid}',	patientid='{$patientid}',date='{$date}' WHERE appoid='{$appoid}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));

    }

    public function deleteAppointment($appoid)
    {
       $result = $this->connection->query("DELETE FROM Appointment WHERE appoid='{$appoid}'");
        return ($result && ($this->connection->affected_rows>0));
    }

    public function findAppointment($appoid)
    {
        $resultset = $this->connection->query("SELECT * FROM Appointment WHERE appoid='{$appoid}'");
        return $resultset->fetch_assoc();
    }

    public function findAllAppointment()
    {
        $resultset = $this->connection->query("SELECT * FROM Appointment");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}