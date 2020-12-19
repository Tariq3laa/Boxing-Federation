<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCategory;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Training\CategoryCollection;
use App\Http\Resources\Training\TrainingCollection;

class TrainingCategoryController extends Controller
{
    public function index()
    {
        return CategoryCollection::collection(TrainingCategory::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(TrainingCategory $training)
    {
        return TrainingCollection::collection($training->trainings()->paginate(10));
    }

    public function edit(TrainingCategory $trainingCategory)
    {
        //
    }

    public function update(Request $request, TrainingCategory $trainingCategory)
    {
        //
    }

    public function destroy(TrainingCategory $trainingCategory)
    {
        //
    }
}
