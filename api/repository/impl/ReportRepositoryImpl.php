<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/29/18
 * Time: 8:12 AM
 */

require_once __DIR__ . '/../ReportRepository.php';

class ReportRepositoryImpl implements ReportRepository
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

    public function saveReport($reportid, $docid, $patientid, $dateoftest, $details)
    {
        $result = $this->connection->query("INSERT INTO Report VALUES ('{$reportid}','{$docid}','{$patientid}','{$dateoftest}','{$details}')");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows>0));
    }

    public function updateReport($reportid, $docid, $patientid, $dateoftest, $details)
    {
        $result = $this->connection->query("UPDATE Report SET doctorid='{$docid}', patientid='{$patientid}', 	date='{$dateoftest}', Details='{$details}' WHERE reportid='{$reportid}'");
            echo $this->connection->error;
            return ($result && ($this->connection->affected_rows>0));
    }

    public function deleteReport($reportid)
    {
        $result = $this->connection->query("DELETE FROM Report WHERE reportid='{$reportid}'");
        return ($result && ($this->connection->affected_rows>0));

    }

    public function findReport($reportid)
    {
       $resultset = $this->connection->query("SELECT * from Report WHERE reportid='{$reportid}'");
       return $resultset->fetch_assoc();
    }

    public function findAllReports()
    {
        $resultset = $this->connection->query("SELECT * FROM Report");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}