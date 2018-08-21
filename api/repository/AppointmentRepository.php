<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/26/18
 * Time: 6:07 AM
 */

interface AppointmentRepository
{
    public function setConnection(mysqli $connection);

    public function saveAppointment($appoid,$docid,$patientid,$date);

    public function updateAppointment($appoid,$docid,$patientid,$date);

    public function deleteAppointment($appoid);

    public function findAppointment($appoid);

    public function findAllAppointment();

}