<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Abstracts\CrudController;
use App\Interfaces\TeachersRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeachersController extends CrudController
{
    public function __construct(TeachersRepositoryInterface $orderRepository)
    {
        $this->orderRepository=$orderRepository;
    }
    public function removeStudent(Request $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->removeStudent($request->teacher_id,$request->student_id)]);
    }
    public function addStudent(Request $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->addStudent($request->teacher_id,$request->student_id)]);
    }
    public function getGroup(Request $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->getTeacherGroup($request->teacher_id)]);
    }
}
