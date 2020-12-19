<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsSponsor;
use Illuminate\Http\Request;
use App\Http\Resources\News\NewsResource;
use App\Http\Resources\News\NewsCollection;
use App\Http\Requests\News\NewsStoreRequest;
use App\Http\Requests\News\NewsUpdateRequest;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    public function index()
    {
        return NewsCollection::collection(News::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(NewsStoreRequest $request)
    {
        $news = new News;
        $news->writer_id = $request->writer_id;
        $news->date = $request->date;
        $news->title = $request->title;
        $news->description = $request->description;
        $news->photo = $request->file('photo')->store('public');
        $news->save();

        for ($i=0; $i < count($request->sponsor_id) ; $i++) {
            $newsSponsors = new NewsSponsor;
            $newsSponsors->news_id = $news->id;
            $newsSponsors->sponsor_id = $request->sponsor_id[$i];
            $newsSponsors->save();
        }


        return response()->json([
            'data' => new NewsResource($news)
        ], Response::HTTP_CREATED);
    }

    public function show(News $news)
    {
        return new NewsResource($news);
    }

    public function edit(News $news)
    {
        //
    }

    public function update(NewsUpdateRequest $request, News $news)
    {
        if($request->has('writer_id'))
            $news->writer_id = $request->writer_id;
        if($request->has('date'))
            $news->date = $request->date;
        if($request->has('title'))
            $news->title = $request->title;
        if($request->has('description'))
            $news->description = $request->description;
        if($request->has('photo')) {
            unlink(storage_path("app/$news->photo"));
            $news->photo = $request->file('photo')->store('public');
        }
        $news->save();

        return response()->json([
            'data' => new NewsResource($news)
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy(News $news)
    {
        // unlink(storage_path("app/$news->photo"));
        $news->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
