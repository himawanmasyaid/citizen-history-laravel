<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EntrepreneurResource;
use App\Models\Entrepreneur;
use Illuminate\Http\Request;

class EntrepreneurController extends Controller
{
    public function index() {
        $entrepreneurs = Entrepreneur::all();

        return EntrepreneurResource::collection($entrepreneurs);
    }

    public function show($id) {
        $entrepreneurs = Entrepreneur::findOrFail($id);

        return new EntrepreneurResource($entrepreneurs);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'desc' =>'required',
            'address' => 'required',
            'no' => 'nullable',
            'maps' => 'nullable'
        ]);

        Entrepreneur::create($validated);
    }

    public function update(Request $request, $id) {
        
        $validated = $request->validate([
            'name' => 'required',
            'desc' =>'required',
            'address' => 'required',
            'no' => 'nullable',
            'maps' => 'nullable'
        ]);

        Entrepreneur::where('id', $id)
            ->update($validated);

    }


    public function destroy($id) {
        $article = Entrepreneur::findOrFail($id);
        $article->delete();

    }
    
}
