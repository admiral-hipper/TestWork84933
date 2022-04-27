<?php
namespace App\Interfaces;
interface TeachersRepositoryInterface extends UniversityRepositoryInterface{
    /**
     * Remove stundent from current teacher's students list
     * @param  int $teacherId Teacher's ID
     * @param int $studentId Student's ID
     * @return
     */
    public function removeStudent($teacherId,$studentId);
    /**
     * Add new Student to Teacher's students list
     * @param  int $teacherId Teacher's ID
     * @param int $studentId Student's ID
     * @return
     */
    /**
     * Add Teacher to Student's teachers list 
     * @param int $teacherId Teacher's ID
     * @param int $studentsId Student's ID
     * @param bool $is_curator Flag if teacher is curator
     * @return
     */
    public function addStudent($teacherId,$studentId,$is_curator=0);
    /**
     * Get all students, which are in group of this teacher
     * @param int $teacherId TeacherId
     * @return
     */
    public function getStudentsGroup($teacherId);
}
?>