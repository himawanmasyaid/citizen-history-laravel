<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $urlImage = url(Storage::url($this->image));
        $urlVid = url(Storage::url($this->video));

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $urlImage,
            'desc' => $this->desc,
            'video' => $urlVid,
        ];
    }
}
