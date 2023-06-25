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

    // public function store(Request $request) {
        
    //     $validated = $request->validate([
    //         'title' => 'required',
    //         'desc' => 'required',
    //         'video' => 'video|file',
    //     ]);
        
    //     $vidName = $request->file('video')->hashName();
    //     $validated['video'] = $request->file('video')->storeAs('video', $vidName, 'public');

    //     Tour::create($validated);
    // }

    // public function update(Request $request, $id) {
    //     $validated = $request->validate([
    //         'title' => 'required',
    //         'body' => 'required'
    //     ]);

    //     $tour = Tour::findOrFail($id);
    //     $tour->update($request->all());
    // }

    // public function destroy($id) {
    //     $tour = Tour::findOrFail($id);
    //     $tour->delete();
    // }

}
