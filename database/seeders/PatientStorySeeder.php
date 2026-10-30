<?php

namespace Database\Seeders;

use App\Models\PatientStory;
use Illuminate\Database\Seeder;

class PatientStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = [
            [
                'name' => 'Michael Thornton',
                'headline' => 'Successful Double Bypass Surgery with Fast Recovery at Medanta',
                'story' => "When I was diagnosed with severe triple-vessel CAD in London, NHS waiting times were nearly 9 months. HealGoFly coordinated everything for me at Medanta in Gurugram, India within 10 days. From our airport arrival to consultation with Dr. Trehan, the clinical care was world-class. My surgical outcome was fantastic and I was walking comfortably by day 5. The total cost was less than 20% of what private UK care would have charged, with zero compromises in quality.",
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=600&q=80',
                ],
                'country' => 'United Kingdom',
                'hospital_name' => 'Medanta - The Medicity',
                'treatment_name' => 'Cardiothoracic Surgery & CABG',
                'rating' => 5,
                'status' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Fatima Al-Zahra',
                'headline' => 'Advanced Living Donor Liver Transplant That Saved My Father',
                'story' => "My father was in end-stage liver failure. Hospitals in Oman advised us to seek high-volume transplant centers in India. HealGoFly managed our medical visa invitation letter within 24 hours. The medical coordinator met us directly at Delhi airport with an ambulance and translator. Dr. Soin and his surgical team completed a 12-hour living donor liver transplant with complete success. Today my father is healthy and back with his grandchildren.",
                'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=600&q=80',
                ],
                'country' => 'Oman',
                'hospital_name' => 'Medanta - The Medicity',
                'treatment_name' => 'Hepatology & Liver Transplant',
                'rating' => 5,
                'status' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'David & Grace Mwangi',
                'headline' => 'Bilateral Robotic Knee Replacement with Zero Pain',
                'story' => "Severe osteoarthritis had restricted my mother from walking for more than 4 years in Nairobi. We were anxious about traveling abroad for surgery, but the HealGoFly international desk organized video consultations before we even left Kenya. The robotic navigation knee replacement at Apollo Hospital in Delhi gave her complete mobility back in just 2 weeks. The nursing and physiotherapy staff were exceptionally warm and compassionate.",
                'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
                ],
                'country' => 'Kenya',
                'hospital_name' => 'Indraprastha Apollo Hospitals',
                'treatment_name' => 'Orthopedics & Joint Replacement',
                'rating' => 5,
                'status' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Tofazzal Hossain',
                'headline' => 'Complex Neuro-Spinal Deformity Correction',
                'story' => "I suffered from severe cervical spinal stenosis causing numbness and pain radiating to both arms. Local doctors in Dhaka recommended urgent surgery. HealGoFly reviewed my MRI scans within 6 hours and arranged an immediate appointment with top spine surgeons. The microsurgical decompression was completely successful. I am now back at work with 100% normal sensation and zero painkillers.",
                'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=600&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=600&q=80',
                ],
                'country' => 'Bangladesh',
                'hospital_name' => 'Indraprastha Apollo Hospitals',
                'treatment_name' => 'Neuro & Spine Surgery',
                'rating' => 5,
                'status' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($stories as $storyData) {
            PatientStory::updateOrCreate(
                ['name' => $storyData['name'], 'headline' => $storyData['headline']],
                $storyData
            );
        }
    }
}

