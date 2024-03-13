<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'desc'
    ];

    
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Registering a deleting event to handle related quizzes before deletion
        static::deleting(function ($category) {
            // Find all quizzes with the category being deleted
            $relatedQuizzes = Quiz::where('category_id', $category->id)->get();

            // Update the category ID of related quizzes to 1 (uncategorized)
            $relatedQuizzes->each(function ($quiz) {
                $quiz->update(['category_id' => 1]);
            });
        });
    }
}
