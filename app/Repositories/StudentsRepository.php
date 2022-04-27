<?php
namespace App\Repositories;

use App\Interfaces\StudentsRepositoryInterface;
use App\Models\Students;

class StudentsRepository implements StudentsRepositoryInterface{
    public function getAllOrders(){
        return Students::all();
    }
    public function getOrderById($orderId){
        return Students::whereId($orderId)->with('teachers')->get();
    }
    public function deleteOrder($orderId){
        Students::findOrFail($orderId)->teachers()->detach();
        Students::destroy($orderId);
    }
    public function createOrder(array $orderDetails){
        return Students::create($orderDetails);
    }
    public function updateOrder($orderId, array $newDetails){
        return Students::whereId($orderId)->update($newDetails);
    }
    public function removeTeacher($studentId,$teacherId)
    {
        Students::findOrFail($studentId)->teachers()->detach($teacherId);
        return "Teacher was successfully removed";
    }
    public function addTeacher($studentId,$teacherId,$is_curator=0)
    {   Students::findOrFail($studentId)->teachers()->detach($teacherId);
        Students::findOrFail($studentId)->teachers()->attach($teacherId,['is_curator'=>$is_curator]);
        return "Teacher was successfully added";
    }
    public function getCurator($studentId)
    {
        return Students::findOrFail($studentId)->teachers()->where('is_curator','=',1)->get();
    }
}
?>