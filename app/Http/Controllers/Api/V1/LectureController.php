<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return LectureResource::collection(Lecture::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLectureRequest $request): LectureResource
    {
        $lecture = Lecture::create($request->validated());

        return new LectureResource($lecture);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture): LectureResource
    {
        return new LectureResource($lecture->load('groups', 'lectures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLectureRequest $request, Lecture $lecture): bool
    {
        return $lecture->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecture $lecture): ?bool
    {
        return $lecture->delete();
    }
}
