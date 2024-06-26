<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Number;

class SheetmusicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'archive_id' => $this->archive_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'composer' => $this->composer,
            'arranger' => $this->arranger,
            'publisher' => $this->publisher,
            'style' => $this->style,
            'grad' => (float)$this->grad,
            'flex' => (float)$this->flex,
            'duration' => $this->duration,
            'is_digital' => (bool)$this->is_digital,
            'demo_url' => $this->demo_url,
            'price' => (float)$this->price,
            'performances' => $this->performances,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
