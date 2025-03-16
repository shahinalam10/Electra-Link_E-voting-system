<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VoterId;	// Import the VoterId model	

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run() {
        VoterId::create(['voter_id' => '123456789']);
        VoterId::create(['voter_id' => '987654321']);
    }
}
