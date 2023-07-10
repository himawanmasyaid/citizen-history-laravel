<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $urlImage = url(Storage::url($this->image));
        
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $url = $urlImage,
            'body' => $this->body,
        ];
    }
}
