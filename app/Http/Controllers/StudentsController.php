<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Abstracts\CrudController;
use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Interfaces\StudentsRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class StudentsController extends CrudController
{
    
    public function __construct(StudentsRepositoryInterface $orderRepository)
    {
        $this->orderRepository=$orderRepository;
    }
    public function deleteTeacher(Request $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->removeTeacher($request->student_id,$request->teacher_id)],200);
    }
    public function addTeacher(Request $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->addTeacher($request->student_id,$request->teacher_id)],200);
    }
    public function getCurator(Request $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->getCurator($request->student_id)],200);
    }
}
