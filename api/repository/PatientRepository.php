<?php

interface PatientRepository{
    public function setConnection(mysqli $connection);

    public function savePatient($id,$name,$gender,$address,$age);

    public function updatePatient($id,$name,$gender,$address,$age);

    public function deletePatient($id);

    public function findPatient($id);

    public function findAllPatients();
}