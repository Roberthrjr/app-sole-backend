<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\Image;
use App\Models\Note;
use App\Models\Profile;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GenreSeeder::class);
        $this->call(UserSeeder::class);
        Storage::deleteDirectory('public/images');
        Storage::makeDirectory('public/images');
        Publisher::factory(5)->create();
        Author::factory()->has(Book::factory()->count(3))->create();
        Author::factory()->has(Book::factory()->count(2))->create();
        Author::factory()->has(Book::factory()->count(2))->create();
        Author::factory()->has(Book::factory()->count(1))->create();
        Profile::factory(4)->create();
        Image::factory(2)->create();
        Note::factory(10)->create();
        User::factory()->hasAttached(Author::factory()->count(2), ['number_star'=>rand(1,5)])->create();
        User::factory()->hasAttached(Author::factory()->count(2), ['number_star'=>rand(1,5)])->create();
    }
}
