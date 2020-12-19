<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Models\TraineeTraining;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Training\TraineeResource;
use App\Http\Resources\Training\TraineeCollection;
use App\Http\Resources\Training\TrainingCollection;
use App\Http\Requests\Training\TraineeStoreRequest;
use App\Http\Requests\Training\TraineeUpdateRequest;

class TraineeController extends Controller
{
    public function index()
    {
        return TraineeCollection::collection(Trainee::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(TraineeStoreRequest $request)
    {
        $trainee = new Trainee;
        $trainee->name = $request->name;
        $trainee->email = $request->email;
        $trainee->phone = $request->phone;
        $trainee->message = $request->message;
        $trainee->save();

        $traineeTraining = new TraineeTraining;
        $traineeTraining->trainee_id = $trainee->id;
        $traineeTraining->training_id = $request->training_id;
        $traineeTraining->save();

        return response()->json([
            'data' => new TraineeResource($trainee)
        ], Response::HTTP_CREATED);
    }

    public function show(Trainee $trainee)
    {
        return new TraineeResource($trainee);
    }

    public function edit(Trainee $trainee)
    {
        //
    }

    public function update(TraineeUpdateRequest $request, Trainee $trainee)
    {
        if($request->has('name'))
            $trainee->name = $request->name;
        if($request->has('email'))
            $trainee->email = $request->email;
        if($request->has('phone'))
        $trainee->phone = $request->phone;
        if($request->has('message'))
        $trainee->message = $request->message;
        $trainee->save();

        return response()->json([
            'data' => new TraineeResource($trainee)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Trainee $trainee)
    {
        $trainee->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function traineeTrainings(Trainee $trainee)
    {
        return TrainingCollection::collection($trainee->training);
    }
}
