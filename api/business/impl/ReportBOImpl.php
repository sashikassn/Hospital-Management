<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/29/18
 * Time: 8:06 AM
 */

require_once __DIR__ . '/../ReportBO.php';
require_once __DIR__ . '/../../repository/impl/ReportRepositoryImpl.php';
require_once __DIR__ . '/../../db/DBConnection.php';


class ReportBOImpl implements ReportBO
{
        private $ReportRepository;

        public function __construct()
        {
            $this->ReportRepository = new ReportRepositoryImpl();
        }

    public function getReportCount()
    {
      $connection = (new DBConnection())->getConnection();
      $this->ReportRepository->setConnection($connection);

      $count = count($this->ReportRepository->findAllReports());
      mysqli_close($connection);
      return $count;
    }

    public function getAllReports()
    {
        $connection = (new DBConnection())->getConnection();
        $this->ReportRepository->setConnection($connection);

        $reports = $this->ReportRepository->findAllReports();

        mysqli_close($connection);
        return $reports;
    }

    public function deleteReports($reportid)
    {
        $connection = (new DBConnection())->getConnection();
        $this->ReportRepository->setConnection($connection);

        $result = $this->ReportRepository->deleteReport($reportid);
        mysqli_close($connection);
        return $result;
    }

    public function saveReports($reportid,$docid,$patientid,$dateoftest,$details)
    {
        $connection = (new DBConnection())->getConnection();
        $this->ReportRepository->setConnection($connection);

        $result = $this->ReportRepository->saveReport($reportid,$docid,$patientid,$dateoftest,$details);
        mysqli_close($connection);
        return $result;

    }

    public function updateReports($reportid,$docid,$patientid,$dateoftest,$details)
    {
        $connection = (new DBConnection())->getConnection();
        $this->ReportRepository->setConnection($connection);

        $result = $this->ReportRepository->updateReport($reportid,$docid,$patientid,$dateoftest,$details);
        mysqli_close($connection);
        return $result;

    }

    public function findReport($reportid)
    {
        $connection = (new DBConnection())->getConnection();
        $this->ReportRepository->setConnection($connection);

        $result = $this->ReportRepository->findReport($reportid);
        mysqli_close($connection);
        return $result;

    }
}