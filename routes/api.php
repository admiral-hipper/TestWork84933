<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('teachers')->group(function(){
    Route::get('/', [TeachersController::class, 'index']);
    Route::get('/group',[TeachersController::class,'getGroup']);
    Route::get('/{id}', [TeachersController::class, 'show']);
    Route::post('/', [TeachersController::class, 'store']);
    Route::put('/{id}', [TeachersController::class, 'update']);
    Route::delete('/{id}', [TeachersController::class, 'delete']);
    Route::post('/add/student',[TeachersController::class,'addStudent']);
    Route::post('/delete/student',[TeachersController::class,'removeStudent']);
});



Route::prefix('students')->group(function(){
    Route::get('/', [StudentsController::class, 'index']);
    Route::get('curator',[StudentsController::class,'getCurator']);
    Route::get('/{id}', [StudentsController::class, 'show']);
    Route::post('/', [StudentsController::class, 'store']);
    Route::put('/{id}', [StudentsController::class, 'update']);
    Route::delete('/{id}', [StudentsController::class, 'delete']);
    Route::post('/curator}',[StudentsController::class,'getCurator']);
    Route::post('/delete/teacher',[StudentsController::class,'deleteTeacher']);
    Route::post('/add/teacher',[StudentsController::class,'addTeacher']);
});

