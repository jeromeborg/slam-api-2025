<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        $author = Author::inRandomOrder()->first();

        return [
            'title' => $this->faker->sentence(random_int(3, 6)),
            'description' => $this->faker->paragraph(3, true),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'isbn' => $this->generateRandomISBN(),
            'author_id' => $author->id,
        ];
    }

    /**
     * @throws RandomException
     */
    private function generateRandomISBN(): string
    {
        $prefix = (random_int(0, 1) === 0) ? '978' : '979';
        $registrationGroup = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
        $registrant = str_pad(random_int(0, 999), 3, '0', STR_PAD_LEFT);
        $publication = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        $isbnWithoutChecksum = $prefix.$registrationGroup.$registrant.$publication;

        $checksum = 0;
        $weight = 1;

        for ($i = 0; $i < 12; $i++) {
            $digit = (int) $isbnWithoutChecksum[$i];
            $checksum += $digit * $weight;
            $weight = ($weight === 1) ? 3 : 1;
        }

        $checksumDigit = (10 - ($checksum % 10)) % 10;

        return $isbnWithoutChecksum.$checksumDigit;
    }

}
