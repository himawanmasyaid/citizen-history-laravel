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
            // 'video' => 'mimetypes:video/mp4|file',
            'link' => 'nullable',
        ]);
        
        if($request->file('image')) {
            $imgName = $request->file('image')->hashName();
            $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');
        }

        // if($request->file('video')) {
        //     $vidName = $request->file('video')->hashName();
        //     $validated['video'] = $request->file('video')->storeAs('video', $vidName, 'public');
        // }

        // dd($validated);
        
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
            // 'video' => 'mimetypes:video/mp4|file',
            'link' => 'nullable',
        ];

        $validated = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::disk('public')->delete($tour->image);
            }
            $imgName = $request->file('image')->hashName();
            $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');
        };

        // if($request->file('video')) {
        //     if($request->oldVideo) {
        //         Storage::disk('public')->delete($tour->video);
        //     }
        //     $vidName = $request->file('video')->hashName();
        //     $validated['video'] = $request->file('video')->storeAs('video', $vidName, 'public');
        // }


        Tour::where('id', $tour->id)
            ->update($validated);

            return redirect('/dashboard/tours')->with('success', 'Virtual Tour berhasil diperbarui');
        
    }

    public function destroy(Tour $tour) {
        if($tour->image) {
            Storage::disk('public')->delete($tour->image);
        }

        // if($tour->video) {
        //     Storage::disk('public')->delete($tour->video);
        // }

        Tour::destroy($tour->id);
        
        return redirect('/dashboard/tours')->with('success', 'Virtual Tour berhasil dihapus');
    }
}
