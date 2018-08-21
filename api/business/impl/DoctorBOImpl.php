<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:58 PM
 */

require_once __DIR__ . '/../DoctorBO.php';
require_once __DIR__ . '/../../repository/impl/DoctorRepositoryImpl.php';
require_once __DIR__ . '/../../db/DBConnection.php';

class DoctorBOImpl implements DoctorBO
{

    private $DoctorRepository;

    public function __construct()
    {
        $this->DoctorRepository = new DoctorRepositoryImpl();
    }

    public function getDoctorCount()
    {
        $connection = (new DBConnection())->getConnection();
        $this->DoctorRepository->setConnection($connection);

        $count =  count($this->DoctorRepository->findAllDoctors());

        mysqli_close($connection);

        return $count;
    }

    public function getAllDoctors()
    {

        $connection = (new DBConnection())->getConnection();
        $this->DoctorRepository->setConnection($connection);

        $doctors = $this->DoctorRepository->findAllDoctors();

        mysqli_close($connection);

        return $doctors;
    }

    public function deleteDoctors($id)
    {

        $connection = (new DBConnection())->getConnection();
        $this->DoctorRepository->setConnection($connection);

        $result = $this->DoctorRepository->deleteDoctor($id);

        mysqli_close($connection);

        return $result;
    }

    public function saveDoctor($id, $name, $address,$special)
    {
        $connection = (new DBConnection())->getConnection();
        $this->DoctorRepository->setConnection($connection);

        $result = $this->DoctorRepository->saveDoctor($id,$name,$address,$special);

        mysqli_close($connection);
        return $result;
    }

    public function updateDoctor($id, $name, $address,$special)
    {
        $connection = (new DBConnection())->getConnection();
        $this->DoctorRepository->setConnection($connection);

        $result= $this->DoctorRepository->updateDoctor($id,$name,$address,$special);

        mysqli_close($connection);

        return $result;
    }
}