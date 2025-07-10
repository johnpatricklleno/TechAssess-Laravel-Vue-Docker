<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feedback;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feedback::insert([
            [
                'student_name' => 'Alice Cruz',
                'message' => 'Great class, learned a lot!',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_name' => 'Bryan Tan',
                'message' => 'Too fast-paced, please slow down a bit.',
                'rating' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_name' => 'Catherine Lim',
                'message' => 'Excellent teacher and materials.',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
