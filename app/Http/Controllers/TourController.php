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
            'image' => 'image|file',
            'desc' => 'required',
            'videoLink' => 'nullable',
        ]);
        
        if($request->file('image')) {
            $imgName = $request->file('image')->hashName();
            $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');
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
    
    function update(Request $request, Tour $tour){
        $rules = [
            'title' => 'required',
            'image' => 'image|file',
            'desc' => 'required',
            'videoLink' => 'nullable',
        ];

        $validated = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::disk('public')->delete($tour->image);
            }
            $imgName = $request->file('image')->hashName();
            $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');
        };

        Tour::where('id', $tour->id)
            ->update($validated);

            return redirect('/dashboard/tours')->with('success', 'Virtual Tour berhasil diperbarui');
        
    }

    public function destroy(Tour $tour) {
        if($tour->image) {
            Storage::disk('public')->delete($tour->image);
        }

        Tour::destroy($tour->id);
        
        return redirect('/dashboard/tours')->with('success', 'Virtual Tour berhasil dihapus');
    }
}
