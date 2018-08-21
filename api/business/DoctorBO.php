<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:58 PM
 */

interface DoctorBO
{

    public function getDoctorCount();

    public function getAllDoctors();

    public function deleteDoctors($id);

    public function saveDoctor($id,$name,$address,$special);

    public function updateDoctor($id,$name,$address,$special);

}