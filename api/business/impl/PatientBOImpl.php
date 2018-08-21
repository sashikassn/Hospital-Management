<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/24/18
 * Time: 7:07 AM
 */

require_once  __DIR__ . '/../PatientBO.php';
require_once  __DIR__ . '/../../repository/impl/PatientRepositoryImpl.php';
require_once  __DIR__ . '/../../db/DBConnection.php';


Class PatientBOImpl implements PatientBO {

    private $PatientRepository;

    public function __construct()
    {

        $this->PatientRepository = new PatientRepositoryImpl();

    }


    public function getPatientCount()
    {
        $connection = (new DBConnection())->getConnection();
        $this->PatientRepository->setConnection($connection);

        $count = count($this->PatientRepository->findAllPatients());

        mysqli_close($connection);
        return $count;

    }

    public function getAllPatients()
    {
    $connection = (new DBConnection())->getConnection();
    $this->PatientRepository->setConnection($connection);

    $patients = $this->PatientRepository->findAllPatients();

    mysqli_close($connection);
    return $patients;
    }

    public function deletePatients($id)
    {
       $connection = (new DBConnection())->getConnection();
       $this->PatientRepository->setConnection($connection);

       $result = $this->PatientRepository->deletePatient($id);
       mysqli_close($connection);
       return $result;
    }

    public function savePatients($id,$name,$gender,$address,$age)
    {
        $connection = (new DBConnection())->getConnection();
        $this->PatientRepository->setConnection($connection);

        $result = $this->PatientRepository->savePatient($id,$name,$gender,$address,$age);
        mysqli_close($connection);
        return $result;

    }

    public function updatePatiets($id,$name,$gender,$address,$age)
    {
        $connection = (new DBConnection())->getConnection();
        $this->PatientRepository->setConnection($connection);

        $result = $this->PatientRepository->updatePatient($id,$name,$gender,$address,$age);
        mysqli_close($connection);
        return $result;
    }
}