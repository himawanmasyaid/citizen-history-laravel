<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index', [
            "title" => "Category",
            "categories" => Category::all()
        ]);
    }

    public function create() {
        return view('dashboard.categories.create',[
            'title' => 'Add new category'
        ]);
        
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')],
            'desc' => 'nullable'
        ]);

        // $validated = $request->validate([
        //     'name' => 'required',
        //     'desc' => 'nullable'
        // ]);

        Category::create($validated);

        return redirect('/dashboard/categories')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'title' => 'Edit Category',
            'category'  => $category
        ]);
    }

    public function update(Request $request, Category $category) {
        $validated = $request->validate([
            'name' => 'required',
            'desc' => 'nullable'
        ]);

        Category::where('id', $category->id)
            ->update($validated);

        return redirect('/dashboard/categories')->with('success', 'Kategori Berhasil Diperbarui');
    }

    public function destroy(Category $category) {
        if ($category->id !== 1) {
            // Delete the category and associated records
            $category->delete();
    
            // Optionally, you may also update related records (e.g., quizzes) to set their category to uncategorized or perform other actions.
    
            return redirect('/dashboard/categories')->with('success', 'Kategori Berhasil Dihapus');
        }
    
        // If the user tried to delete uncategorized, show an error message
        return redirect('/dashboard/categories')->with('error', 'Tidak bisa menghapus Uncategorized');
    }
}