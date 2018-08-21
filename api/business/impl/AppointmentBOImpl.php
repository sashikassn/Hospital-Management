<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/25/18
 * Time: 8:50 AM
 */

require_once __DIR__ . '/../AppointmentBO.php';
require_once  __DIR__ . '/../../repository/impl/AppointmentRepositoryImpl.php';
require_once  __DIR__ . '/../../db/DBConnection.php';



class AppointmentBOImpl implements AppointmentBO
{
    private $AppointmentRepository;

    public function __construct()
    {

        $this->AppointmentRepository = new AppointmentRepositoryImpl();

    }

    public function getApponintmetCount()
    {
        $connection = (new DBConnection())->getConnection();
        $this->AppointmentRepository->setConnection($connection);

        $count = count($this->AppointmentRepository->findAllAppointment());

        mysqli_close($connection);
        return $count;
    }

    public function getAllAppointments()
    {
        $connection = (new DBConnection())->getConnection();
        $this->AppointmentRepository->setConnection($connection);

        $appointments = $this->AppointmentRepository->findAllAppointment();

        mysqli_close($connection);
        return $appointments;
    }

    public function deleteAppointments($appoid)
    {
        $connection = (new DBConnection())->getConnection();
        $this->AppointmentRepository->setConnection($connection);

        $result = $this->AppointmentRepository->deleteAppointment($appoid);
        mysqli_close($connection);
        return $result;
    }

    public function saveAppointments($appoid, $docid, $patientid, $date)
    {
        $connection = (new DBConnection())->getConnection();
        $this->AppointmentRepository->setConnection($connection);

        $result = $this->AppointmentRepository->saveAppointment($appoid, $docid, $patientid, $date);
        mysqli_close($connection);
        return $result;
    }

    public function updateAppointments($appoid, $docid, $patientid, $date)
    {
        $connection = (new DBConnection())->getConnection();
        $this->AppointmentRepository->setConnection($connection);

        $result = $this->AppointmentRepository->updateAppointment($appoid, $docid, $patientid, $date);
        mysqli_close($connection);
        return $result;
    }
}