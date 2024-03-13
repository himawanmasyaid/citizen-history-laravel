<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuizController extends Controller
{
    public function index()
    {
        return view('dashboard.quizzes.index', [
            'title' => 'Quizzes',
            'quizzes' => Quiz::all(),
        ]);

    }

    public function create()
    {
        return view('dashboard.quizzes.create', [
            'title' => 'Add new quiz',
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required',
            'category' => 'nullable|exists:categories,id',
            'image' => 'nullable',
            'optionA' =>'required',
            'optionB' => 'required',
            'optionC' => 'required',
            'optionD' => 'required',
            'correctAnswer' => 'required|in:optionA,optionB,optionC,optionD'
        ]);

        if($request->file('image')) {
            $imgName = $request->file('image')->hashName();
            $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');
        }

        $validated['category_id'] = $request->input('category') ?? 1; // Default to category with ID 1


        // dd($validated);
        Quiz::create($validated);

        return redirect('/dashboard/quizzes')->with('success', 'Quiz Berhasil Ditambahkan');
    }

    public function show(Quiz $quiz)
    {
        return view('dashboard.quizzes.show', [
            'title' => $quiz->title,
            'quiz' => $quiz
        ]);
    }

    public function edit(Quiz $quiz)
    {
        return view('dashboard.quizzes.edit', [
            'title' => 'Edit Quiz',
            'quiz'  => $quiz,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'question' => 'required',
            'category' => 'nullable|exists:categories,id',
            'image' => 'nullable',
            'optionA' =>'required',
            'optionB' => 'required',
            'optionC' => 'required',
            'optionD' => 'required',
            'correctAnswer' => 'required|in:optionA,optionB,optionC,optionD'
            
        ]);

        if($request->file('image')) {
            $imgName = $request->file('image')->hashName();
            $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');
        }

        $validated['category_id'] = $request->input('category') ?? 1; // Default to category with ID 1

        // dd($validated);
        $quiz->update($validated);
        // Quiz::where('id', $quiz->id)
        //     ->update($validated);

        return redirect('/dashboard/quizzes')->with('success', 'Quiz Berhasil Diperbarui');
    }

    public function destroy(Quiz $quiz)
    {
        if($quiz->image) {
            Storage::disk('public')->delete($quiz->image);
        }

        Quiz::destroy($quiz->id);

        return redirect('/dashboard/quizzes')->with('success', 'Quiz Berhasil Dihapus');
    }

}
