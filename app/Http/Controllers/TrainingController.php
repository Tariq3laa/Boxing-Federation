<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Training\TrainingResource;
use App\Http\Resources\Training\TraineeCollection;
use App\Http\Resources\Training\TrainingCollection;
use App\Http\Requests\Training\TrainingStoreRequest;
use App\Http\Requests\Training\TrainingUpdateRequest;

class TrainingController extends Controller
{
    public function index()
    {
        return TrainingCollection::collection(Training::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(TrainingStoreRequest $request)
    {
        $course = new Training;
        $course->category_id = $request->category_id;
        $course->coach_id = $request->coach_id;
        $course->date = $request->date;
        $course->title = $request->title;
        $course->age = $request->age;
        $course->location = $request->location;
        $course->period = $request->period;
        $course->price = $request->price;
        $course->other_details = $request->other_details;
        $course->photo = $request->file('photo')->store('public');
        $course->save();

        return response()->json([
            'data' => new TrainingResource($course)
        ], Response::HTTP_CREATED);
    }

    public function show(Training $course)
    {
        return new TrainingResource($course);
    }

    public function edit(Training $course)
    {
        //
    }

    public function update(TrainingUpdateRequest $request, Training $course)
    {
        if($request->has('category_id'))
            $course->category_id = $request->category_id;
        if($request->has('coach_id'))
            $course->coach_id = $request->coach_id;
        if($request->has('period'))
            $course->period = $request->period;
        if($request->has('date'))
            $course->date = $request->date;
        if($request->has('title'))
            $course->title = $request->title;
        if($request->has('price'))
            $course->price = $request->price;
        if($request->has('age'))
        $course->age = $request->age;
        if($request->has('location'))
            $course->location = $request->location;
        if($request->has('other_details'))
            $course->other_details = $request->other_details;
        if($request->has('photo')) {
            unlink(storage_path("app/$course->photo"));
            $course->photo = $request->file('photo')->store('public');
        }
        $course->save();

        return response()->json([
            'data' => new TrainingResource($course)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(Training $course)
    {
        // unlink(storage_path("app/$course->photo"));
        $course->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function courseTrainees(Training $course)
    {
        return TraineeCollection::collection($course->trainees);
    }
}
