<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorFullResource extends JsonResource
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
            'books_count' => $this->books_count ?? null,
            'birthday' => \Carbon\Carbon::parse($this->birthday)->format('d-m-Y'),
        ];
    }
}
