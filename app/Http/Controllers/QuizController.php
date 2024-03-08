<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Http\Controllers\Controller;
use App\Models\Choice;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('dashboard.quizzes.index', [
            'title' => 'Quizzes',
            'quizzes' => Quiz::all(),
        ]);

        $quizzes = Quiz::all();

        foreach ($quizzes as $quiz) {
            $quiz->correct_answer_bg = $this->getCorrectOptionBackground($quiz->correctAnswer);
        }
    }

    public function create()
    {
        return view('dashboard.quizzes.create', [
            'title' => 'Add new quiz'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required',
            'optionA' =>'required',
            'optionB' => 'required',
            'optionC' => 'required',
            'optionD' => 'required',
            'correctAnswer' => 'required|in:optionA,optionB,optionC,optionD'
        ]);

        Quiz::create($validated);

        return redirect('/dashboard/quizzes')->with('success', 'Quiz Berhasil Ditambahkan');
    }

    public function show(Quiz $quiz)
    {
        //
    }

    public function edit(Quiz $quiz)
    {
        return view('dashboard.quizzes.edit', [
            'title' => 'Edit Quiz',
            'quiz'  => $quiz
        ]);
    }

    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'question' => 'required',
            'optionA' =>'required',
            'optionB' => 'required',
            'optionC' => 'required',
            'optionD' => 'required',
            'correctAnswer' => 'required|in:optionA,optionB,optionC,optionD'
            
        ]);

        Quiz::where('id', $quiz->id)
            ->update($validated);

        return redirect('/dashboard/quizzes')->with('success', 'Quiz Berhasil Diperbarui');
    }

    public function destroy(Quiz $quiz)
    {
        Quiz::destroy($quiz->id);

        return redirect('/dashboard/quizzes')->with('success', 'Quiz Berhasil Dihapus');
    }

}
