<?php
namespace App\Interfaces;
interface StudentsRepositoryInterface extends UniversityRepositoryInterface{
    /**
     * Add Teacher to Student's teachers list.
     * PS: I understand, that add Teacher and addStudent work equally, but I leave this code for flexibility of api.
     * @param int $studentId Student's ID from DB
     * @param int $teacherId Teacher's ID from DB
     * @param bool $is_curator Flag if this teacher is a student's curator.
     */
    public function addTeacher($studentId,$teacherId,$is_curator);
    /**
     * Remove Teacher from Student's teachers list.
     * PS: I understand, that add Teacher and removeStudent work equally, but I leave this code for flexibility of api.
     * @param int $studentId Student's ID from DB
     * @return int $teacherId Teachers's ID from DB
     */
    public function removeTeacher($studentId,$teacherId);
    /**
     * Get curator (teacher) of current Student
     * @param int $studentId Student's ID from DB
     * @return
     */
    public function getCurator($studentId);
}
?>