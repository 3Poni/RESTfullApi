<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreApplicationRequest;
use App\Http\Requests\V1\UpdateApplicationRequest;
use App\Http\Resources\V1\ApplicationCollection;
use App\Http\Resources\V1\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        JsonResource::wrap('applications');

        return ApplicationResource::collection(Application::with('bank')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        return new ApplicationResource(Application::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return new ApplicationResource($application);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        if($application->updateOrFail($request->all()) == 1) {
            return new ApplicationResource($application);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        if($application->deleteOrFail() == 1) {
            return response()->json(['message' => 'Application deleted successfully'], 200);
        }
    }
}
