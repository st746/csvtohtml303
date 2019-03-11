<?php
/**
 * Created by PhpStorm.
 * User: sans2010
 * Date: 3/10/2019
 * Time: 4:09 PM
 */

class Student
{
    private $student_id;
    private $insurance_name;
    private $student_phone;

    /**
     * Student constructor.
     * @param $student_id
     * @param $insurance_name
     * @param $student_phone
     */
    public function __construct($student_id, $insurance_name, $student_phone)
    {
        $this->student_id = $student_id;
        $this->insurance_name = $insurance_name;
        $this->student_phone = $student_phone;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $student_id
     */
    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;
    }

    /**
     * @return mixed
     */
    public function getInsuranceName()
    {
        return $this->insurance_name;
    }

    /**
     * @param mixed $insurance_name
     */
    public function setInsuranceName($insurance_name)
    {
        $this->insurance_name = $insurance_name;
    }

    /**
     * @return mixed
     */
    public function getStudentPhone()
    {
        return $this->student_phone;
    }

    /**
     * @param mixed $student_phone
     */
    public function setStudentPhone($student_phone)
    {
        $this->student_phone = $student_phone;
    }
}