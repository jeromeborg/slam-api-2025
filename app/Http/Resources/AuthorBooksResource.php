<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorBooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'bio' => $this->bio,
            'books' => OnlyBookResource::collection($this->books),
            'birthday' => \Carbon\Carbon::parse($this->birthday)->format('d-m-Y')
        ];
    }
}
