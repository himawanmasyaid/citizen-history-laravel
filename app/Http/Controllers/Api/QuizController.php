<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        $quizzes = Quiz::all();

        return QuizResource::collection($quizzes);
    }

    public function show($id) {
        $quizzes = Quiz::findOrFail($id);

        return new QuizResource($quizzes);
    }

    public function showQuizzesByCategory(Request $request, $categoryId)
    {
        $quizzes = Quiz::where('category_id', $categoryId)->get();

        return QuizResource::collection($quizzes);
    }

}
