<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class EntrepreneurResource extends JsonResource
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
            'name' => $this->name,
            'image' => $urlImage,
            'desc' => $this->desc,
            'address' => $this->address,
            'noTelp' => $this->no,
            'maps' => $this->maps,
        ];
    }
}
