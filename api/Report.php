<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/29/18
 * Time: 7:53 AM
 */

require_once 'business/impl/ReportBOImpl.php';
header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$ReportBO = new ReportBOImpl();

switch ($method) {
    case "GET":
        $action = $_GET["action"];


            switch ($action){
                case "count":
                    echo json_encode($ReportBO->getReportCount());
                    break;

                case "all":
                    echo json_encode($ReportBO->getAllReports());
                    break;

                case "findbyid":
                    $reportid= $_GET["id"];
                    echo json_encode($ReportBO->findReport($reportid));
                    break;

            }
            break;


    case "POST":
        $action = $_POST["action"];

        switch ($action){

            case "save":
                $reportid = $_POST["txtReportID"];
                $docid = $_POST["txtDoctorID"];
                $patientid = $_POST["txtPatientID"];
                $dateoftest = $_POST["txtDateofTest"];
                $details = $_POST["txtDetails"];

                echo json_encode($ReportBO->saveReports($reportid,$docid,$patientid,$dateoftest,$details));
                break;


            case "update":
                $reportid = $_POST["txtReportID"];
                $docid = $_POST["txtDoctorID"];
                $patientid = $_POST["txtPatientID"];
                $dateoftest = $_POST["txtDateofTest"];
                $details = $_POST["txtDetails"];

                echo json_encode($ReportBO->updateReports($reportid,$docid,$patientid,$dateoftest,$details));
                break;

        }



    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/",$queryString);

        if (count($queryArray)==2) {
            $reportid = $queryArray[1];
            echo json_encode($ReportBO->deleteReports($reportid));
        }

        break;
}
