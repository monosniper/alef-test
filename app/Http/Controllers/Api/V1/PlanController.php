<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PlanResource::collection(Plan::all()->load('lectures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request): PlanResource
    {
        $plan = Plan::create();

        $plan->lectures()->sync($request->input('lecture_ids'));

        return new PlanResource($plan);
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan): PlanResource
    {
        return new PlanResource($plan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan): PlanResource
    {
        $plan->lectures()->sync($request->input('lecture_ids'));

        return new PlanResource($plan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan): ?bool
    {
        return $plan->delete();
    }
}
