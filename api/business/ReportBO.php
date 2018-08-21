<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/29/18
 * Time: 7:54 AM
 */

interface ReportBO
{
    public function getReportCount();

    public function getAllReports();

    public function deleteReports($reportid);

    public function saveReports($reportid,$docid,$patientid,$dateoftest,$details);

    public function updateReports($reportid,$docid,$patientid,$dateoftest,$details);

    public function findReport($reportid);
}