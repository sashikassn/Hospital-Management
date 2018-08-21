<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/29/18
 * Time: 8:11 AM
 */

interface ReportRepository
{
    public function setConnection(mysqli $connection);

    public function saveReport($reportid, $docid, $patientid, $dateoftest, $details);

    public function updateReport($reportid, $docid, $patientid, $dateoftest, $details);

    public function deleteReport($reportid);

    public function findReport($reportid);

    public function findAllReports();
}