<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourResource;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index() {
        $tours = Tour::all();

        // return response()->json($tours);

        return TourResource::collection($tours);
    }

    public function show($id) {
        $tour = Tour::findOrFail($id);

        return new TourResource($tour);
    }

}
