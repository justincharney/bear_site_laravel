<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email'=> 'John@gmail.com',
        ]);
        
        //set all seeded listings to the one user created above
        Listing::factory(6)->create([
            'user_id' =>$user->id
        ]);

        /* Listing::create([
            'title' => 'Senior Dev',
            'tags' => 'laravel, javascript',
            'company' => 'Acme Corp',
            'location' => 'Boston',
            'email' => 'email@email.com',
            'website' => 'https://www.acme.com',
            'description' => 'some stuff'
        ]);

        Listing::create([
            'title' => 'Junior Dev',
            'tags' => 'Python, java',
            'company' => 'Apple',
            'location' => 'San Francisco',
            'email' => 'email@email.com',
            'website' => 'https://www.apple.com',
            'description' => 'some stuff'
        ]); */
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
