<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:08 PM
 */

require_once 'business/impl/DoctorBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$DoctorBO = new DoctorBOImpl();

switch ($method) {
    case "GET":
        $action = $_GET["action"];

        switch ($action) {
            case "count":
                echo json_encode($DoctorBO->getDoctorCount());
                break;
            case "all":
                echo json_encode($DoctorBO->getAllDoctors());
                break;
        }

        break;
    case "POST":
        $action = $_POST["action"];
//       echo $action;
        switch ($action) {
            case "save" :
                $id = $_POST["txtId"];
                $name = $_POST["txtName"];
                $address = $_POST["txtAddress"];
                $special = $_POST["txtSpecial"];
                echo json_encode($DoctorBO->saveDoctor($id, $name, $address, $special));
                break;

            case "update" :

                $id = $_POST["txtId"];
                //echo $id,$name,$address;
                $name = $_POST["txtName"];
                $address = $_POST["txtAddress"];
                $special = $_POST["txtSpecial"];
//                echo $id,$name,$address;
                echo json_encode($DoctorBO->updateDoctor($id, $name, $address,$special));


                break;
        }
    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/", $queryString);
        if (count($queryArray) === 2) {
            $id = $queryArray[1];
            echo json_encode($DoctorBO->deleteDoctors($id));
        }
        break;
}