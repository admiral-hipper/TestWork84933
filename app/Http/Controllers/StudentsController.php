<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Abstracts\CrudController;
use App\Http\Requests\AddRelations;
use App\Http\Requests\AddStudent;
use App\Http\Requests\ChangeStudent;
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

    public function store(AddStudent $request):JsonResponse
    {
        $orderDetails = $request->only([
            'name',
            'points'
        ]);

        return response()->json(
            [
                'data' => $this->orderRepository->createOrder($orderDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function update(ChangeStudent $request): JsonResponse 
    {
        $orderId = $request->route('id');
        $orderDetails = $request->only([
            'name',
            'points'   
        ]);

        return response()->json([
            'data' => $this->orderRepository->updateOrder($orderId, $orderDetails)
        ]);
    }



    public function deleteTeacher(AddRelations $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->removeTeacher($request->student_id,$request->teacher_id)],200);
    }
    public function addTeacher(AddRelations $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->addTeacher($request->student_id,$request->teacher_id)],200);
    }
    public function getCurator(Request $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->getCurator($request->route('id'))],200);
    }
}
