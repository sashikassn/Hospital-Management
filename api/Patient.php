<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/24/18
 * Time: 12:31 PM
 */

require_once 'business/impl/PatientBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$PatientBO = new PatientBOImpl();

switch ($method) {

    case "GET":
        $action = $_GET["action"];

        switch ($action) {
            case "count":
                echo json_encode($PatientBO->getPatientCount());
                break;
            case "all":
                echo json_encode($PatientBO->getAllPatients());
                break;

        }

        break;

//    case "POST":
//        $action = $_POST["action"];
//        echo $action;
//        switch ($action){
//
//            case "save":
//                $id = $_POST["txtId"];
//                $name = $_POST["txtName"];
//                $gender = $_POST["txtGender"];
//                $address = $_POST["txtAddress"];
//                $age = $_POST["txtAge"];
//                echo json_encode($PatientBO->savePatients($id,$name,$gender,$address,$age));
//                break;
//
//            case "update":
//                $id = $_POST["txtId"];
//                $name= $_POST["txtName"];
//                $gender= $_POST["txtGender"];
//                $address= $_POST["txtAddress"];
//                $age= $_POST["txtAge"];
//                echo json_encode($PatientBO->updatePatiets($id,$name,$gender,$address,$age));
//                break;
//
//        }


//        $id,$name,$gender,$address,$age
//

    case "POST":
        $action = $_POST["action"];
//       echo $action;
        switch ($action) {
            case "save" :
                $id = $_POST["txtId"];
                $name = $_POST["txtName"];
                $gender = $_POST["txtGender"];
                $address = $_POST["txtAddress"];
                $age = $_POST["txtAge"];

                echo json_encode($PatientBO->savePatients($id, $name, $gender, $address, $age));

                break;

            case "update" :

                $id = $_POST["txtId"];

                $name = $_POST["txtName"];
                $gender = $_POST["txtGender"];
                $address = $_POST["txtAddress"];
                $age = $_POST["txtAge"];


                echo json_encode($PatientBO->updatePatiets($id, $name, $gender, $address, $age));


                break;
        }

            case "DELETE":
                $queryString = $_SERVER["QUERY_STRING"];
                $queryArray = preg_split("/=/", $queryString);

                if (count($queryArray) == 2) {
                    $id = $queryArray[1];
                    echo json_encode($PatientBO->deletePatients($id));


                }
                break;


        }


