<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entrepreneur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EntrepreneurController extends Controller
{
    public function index() {
        return view('dashboard.entrepreneurs.index', [
            'title' => "Entrepreneur",
            'entrepreneurs' => Entrepreneur::all(),
        ]);
    }

    public function create() {
        return view('dashboard.entrepreneurs.create', [
            'title' => "Create New Entrepreneur"
        ]);
    }
    
    public function store(Request $request) {
        $rules = [
            'name' => 'required',
            'image' => 'image|file',
            'desc' =>'required',
            'address' => 'required',
            'no' => 'nullable',
            'maps' => 'nullable'
        ];

        $validated = $request->validate($rules);

        if($request->file('image')) {
            $imgName = $request->file('image')->hashName();
            $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');
        }

        Entrepreneur::create($validated);

        return redirect('/dashboard/entrepreneurs')->with('success', 'Pengusaha Berhasil Ditambahkan');
    }


    public function show(Entrepreneur $entrepreneur) {
        return view('dashboard.entrepreneurs.show', [
            'title' => $entrepreneur->title,
            'entrepreneur' => $entrepreneur
        ]);
    }

    public function edit(Entrepreneur $entrepreneur) {
        return view('dashboard.entrepreneurs.edit', [
            'title' => 'Edit Pengusaha',
            'entrepreneur' => $entrepreneur
        ]);
    }

    public function update(Request $request, Entrepreneur $entrepreneur) {
        
        $rules = [
            'name' => 'required',
            'image' => 'image|file',
            'desc' =>'required',
            'address' => 'required',
            'no' => 'nullable',
            'maps' => 'nullable'
        ];

        $validated = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::disk('public')->delete($entrepreneur->image);
            }
            $imgName = $request->file('image')->hashName();
            $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');
        };

        Entrepreneur::where('id', $entrepreneur->id)
            ->update($validated);

        return redirect('/dashboard/entrepreneurs')->with('success', 'Pengusaha Berhasil Diperbarui');
    }


    public function destroy(Entrepreneur $entrepreneur) {
        Entrepreneur::destroy($entrepreneur->id);

        return redirect('/dashboard/entrepreneurs')->with('success', 'Pengusaha Berhasil Dihapus');
    }
    
}
