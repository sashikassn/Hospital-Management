<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/24/18
 * Time: 7:05 AM
 */

interface PatientBO{

    public function getPatientCount();

    public function getAllPatients();

    public function deletePatients($id);

    public function savePatients($id,$name,$gender,$address,$age);

    public function updatePatiets($id,$name,$gender,$address,$age);


}