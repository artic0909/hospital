<?php

namespace Database\Seeders;

use App\Models\HowItWork;
use Illuminate\Database\Seeder;

class HowItWorksSeeder extends Seeder
{
    /**
     * Run the database seeds for How It Works / What We Do workflow steps.
     */
    public function run(): void
    {
        $steps = [
            [
                'step_number' => 1,
                'title' => 'Contact Us',
                'description' => 'Contact us, share your case details and our team will get in touch with you.',
                'icon' => 'phone',
                'image' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'step_number' => 2,
                'title' => 'Medical Opinion & Estimate',
                'description' => 'Receive medical opinion and cost estimate within 48 Hours.',
                'icon' => 'clipboard',
                'image' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'step_number' => 3,
                'title' => 'Book Flights & Arrival',
                'description' => 'Book flights and get received by our team at the airport.',
                'icon' => 'plane',
                'image' => null,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'step_number' => 4,
                'title' => 'Treatment & Follow Ups',
                'description' => 'Get treated and fly back. We stay in touch with you for follow ups.',
                'icon' => 'heart',
                'image' => null,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($steps as $step) {
            HowItWork::updateOrCreate(
                ['step_number' => $step['step_number']],
                $step
            );
        }

        $this->command?->info('How It Works / What We Do steps seeded successfully (' . count($steps) . ' steps).');
    }
}

