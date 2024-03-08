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
}
