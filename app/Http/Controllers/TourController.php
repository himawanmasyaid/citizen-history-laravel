<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{

    public function index() {
        return view('dashboard.tours.index', [
            'title' => 'Virtual Tour',
            'tours' => Tour::all()
        ]);
    }

    public function create() {
        return view('dashboard.tours.create', [
            'title' => 'Add new tour'
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'video' => 'video|file',
        ]);
        
        if($request->file('video')) {
            $vidName = $request->file('video')->hashName();
            $validated['video'] = $request->file('video')->storeAs('video', $vidName, 'public');
        }

        Tour::create($validated);


        return redirect('/dashboard/tours')->with('success', 'Virtual Tour Berhasil Ditambahkan');
    }

    public function edit(Tour $tour) {
        return view('dashboard.tours.edit', [
            'title' => 'Edit Virtual Tour',
            'tour' => $tour
        ]);
    }

    public function destroy(Tour $tour) {
        if($tour->image) {
            Storage::disk('public')->delete($tour->video);
        }

        Tour::destroy($tour->id);
        
        return redirect('/dashboard/tours')->with('success', 'Virtual Tour berhasil dihapus');
    }
}
