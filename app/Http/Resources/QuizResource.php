<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class QuizResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        

        $data = [
            'id' => $this->id,
            'question' => $this->question,
            'category' => $this->category->name,
            // 'image' => $urlImage,
            'optionA' => $this->optionA,
            'optionB' => $this->optionB,
            'optionC' => $this->optionC,
            'optionD' => $this->optionD,
            'correctAnswer' => $this->correctAnswer
        ];

        if ($this->image)
        {
            $data['image'] = url(Storage::url($this->image));
        } else {
            $data['image'] = $this->image;
        }
        
        return $data;
    }
}
