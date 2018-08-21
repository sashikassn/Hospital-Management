<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/25/18
 * Time: 8:48 AM
 */

interface AppointmentBO
{


    public function getApponintmetCount();

    public function getAllAppointments();

    public function deleteAppointments($id);

    public function saveAppointments($appoid,$docid,$patientid,$date);

    public function updateAppointments($appoid,$docid,$patientid,$date);


}