<?php
namespace App\Repositories;

use App\Interfaces\TeachersRepositoryInterface;
use App\Models\Teachers;

class TeachersRepository implements TeachersRepositoryInterface{
    public function getAllOrders(){
        return Teachers::all();
    }
    public function getOrderById($orderId){
        return Teachers::whereId($orderId)->with('students')->get();
    }
    public function deleteOrder($orderId){
        Teachers::destroy($orderId);
    }
    public function createOrder(array $orderDetails){
        return Teachers::create($orderDetails);
    }
    public function updateOrder($orderId, array $newDetails){
        return Teachers::whereId($orderId)->update($newDetails);
    }
    public function addStudent($teacherId, $studentId,$is_curator=0)
    {
        return Teachers::whereId($teacherId)->get()[0]->students()->attach($teacherId,['is_curator'=>$is_curator]);
    }
    public function removeStudent($teacherId, $studentId)
    {
        return Teachers::whereId($studentId)->get()[0]->students()->detach($teacherId);
    }
    public function getStudentsGroup($teacherId)
    {
        return Teachers::whereId($teacherId)->get()[0]->students()->where('is_curator','=',true)->get();
    }
}
?>