<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/26/18
 * Time: 7:05 AM
 */


require_once 'business/impl/AppointmentBOImpl.php';
header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];


$AppointmentBO = new AppointmentBOImpl();

switch ($method) {
    case "GET":
        $action = $_GET["action"];



        switch ($action){
            case "count":
                echo json_encode($AppointmentBO->getApponintmetCount());
                break;

            case "all":
                echo json_encode($AppointmentBO->getAllAppointments());
                break;

        }

        break;


    case "POST":
        $action = $_POST["action"];
        switch ($action){

            case "save":
                $appoid = $_POST["txtappoid"];
                $docid = $_POST["txtdocid"];
                $patientid = $_POST["txtpatientid"];
                $date = $_POST["txtDate"];

                echo json_encode($AppointmentBO->saveAppointments($appoid,$docid,$patientid,$date));
                break;

            case "update":
                $appoid = $_POST["txtappoid"];
                $docid = $_POST["txtdocid"];
                $patientid = $_POST["txtpatientid"];
                $date = $_POST["txtDate"];

                echo json_encode($AppointmentBO->updateAppointments($appoid,$docid,$patientid,$date));
                break;

        }

    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/",$queryString);

        if (count($queryArray)==2){
            $appoid =$queryArray[1];
            echo json_encode($AppointmentBO->deleteAppointments($appoid));


        }
        break;
}