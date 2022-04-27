<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Abstracts\CrudController;
use App\Http\Requests\AddRelations;
use App\Http\Requests\AddTeacher;
use App\Http\Requests\ChangeTeacher;
use App\Interfaces\TeachersRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeachersController extends CrudController
{
    public function __construct(TeachersRepositoryInterface $orderRepository)
    {
        $this->orderRepository=$orderRepository;
    }
    public function removeStudent(AddRelations $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->removeStudent($request->teacher_id,$request->student_id)]);
    }
    public function addStudent(AddRelations $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->addStudent($request->teacher_id,$request->student_id)]);
    }
    public function getGroup(Request $request):JsonResponse
    {
        return response()->json(['data'=>$this->orderRepository->getStudentsGroup($request->route('id'))]);
    }

    public function store(AddTeacher $request):JsonResponse
    {
        $orderDetails = $request->only([
            'name',
            'subject',
            'start_of_work',
            'rating'
        ]);

        return response()->json(
            [
                'data' => $this->orderRepository->createOrder($orderDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function update(ChangeTeacher $request): JsonResponse 
    {
        $orderId = $request->route('id');
        $orderDetails = $request->only([
            'name',
            'subject',
            'rating',
            'start_of_work'   
        ]);

        return response()->json([
            'data' => $this->orderRepository->updateOrder($orderId, $orderDetails)
        ]);
    }
}
