<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:41 PM
 */

interface DoctorRepository
{

    public function setConnection(mysqli $connection);

    public function saveDoctor($id,$name,$address,$special);

    public function updateDoctor($id, $name, $address,$special);

    public function deleteDoctor($id);

    public function findDoctor($id);

    public function findAllDoctors();

}