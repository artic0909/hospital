<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Hospital;
use App\Models\HospitalImage;
use App\Models\Infrustructure;
use App\Models\LocationGuide;
use App\Models\Partner;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Database\Seeder;

class PartnerHospitalModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospitals = Hospital::take(2)->get();

        foreach ($hospitals as $hosp) {
            // 1. Link Partner
            if (\Illuminate\Support\Facades\Schema::hasTable('partners') && \Illuminate\Support\Facades\Schema::hasColumn('partners', 'email')) {
                $query = Partner::query();
                if (\Illuminate\Support\Facades\Schema::hasColumn('partners', 'company_name')) {
                    $partner = $query->where('email', $hosp->email)
                        ->orWhere('company_name', $hosp->name)
                        ->first();
                } else {
                    $partner = $query->where('email', $hosp->email)->first();
                }

                if ($partner && \Illuminate\Support\Facades\Schema::hasColumn('partners', 'hospital_id')) {
                    $partner->update(['hospital_id' => $hosp->id]);
                }
            }

            // 2. Seed Facilities
            $facilityNames = [
                '24x7 Emergency & Trauma Center',
                'Advanced Robotic Surgery Unit (da Vinci Xi)',
                '128-Slice Cardiac CT & 3T MRI Suite',
                'Comprehensive Organ Transplant ICU',
                'Digital Biplane Cath Lab',
                'Blood Bank with Apheresis Support',
                'Dedicated Bone Marrow Transplant Unit',
                'In-house Clinical Diagnostic Laboratory',
            ];

            foreach ($facilityNames as $facName) {
                Facility::firstOrCreate([
                    'hospital_id' => $hosp->id,
                    'name' => $facName,
                ], [
                    'image' => null,
                ]);
            }

            // 3. Seed Campus Gallery Images
            $sampleImages = [
                ['title' => 'Main Hospital Entrance & Emergency Drop', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                ['title' => 'Advanced Cardiac Surgery Theater', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                ['title' => 'Executive Patient Suite & Recovery Lounge', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                ['title' => 'Diagnostic Imaging & 3T MRI Suite', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                ['title' => 'International Patient Lounge & Concierge Desk', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                ['title' => 'Pediatric Intensive Care Unit (PICU)', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
            ];

            foreach ($sampleImages as $img) {
                HospitalImage::firstOrCreate([
                    'hospital_id' => $hosp->id,
                    'title' => $img['title'],
                ], [
                    'image' => $img['image'],
                ]);
            }

            // 4. Seed Infrustructure
            Infrustructure::firstOrCreate([
                'hospital_id' => $hosp->id,
            ], [
                'description' => '<h3>World-Class Architectural and Medical Infrastructure</h3><p>Spread over 43 acres with over <strong>1,250 certified patient beds</strong>, 45 state-of-the-art modular operating suites, and 350 critical care beds. All surgical theaters are equipped with <strong>laminar air-flow systems</strong> and HEPA filtration to maintain 100% sterile environments.</p><h4>Key Infrastructure Highlights:</h4><ul><li><strong>Robotic Surgical Center:</strong> Dual-console da Vinci Xi system for cardiac, urological, and bariatric precision surgery.</li><li><strong>Critical Care Architecture:</strong> Dedicated Coronary Care Unit (CCU), Medical ICU, Surgical ICU, and Pediatric & Neonatal ICUs.</li><li><strong>24/7 Level-1 Trauma Suite:</strong> Helipad for air ambulance evacuations and triage bays with dedicated imaging.</li></ul>',
            ]);

            // 5. Seed Services (All 7 categories from user image)
            $servicesByCategory = [
                'Comfort During Stay' => [
                    'Private Deluxe & Suite Rooms with Attendant Couch',
                    'High-Speed Wi-Fi & Smart TV in Patient Rooms',
                    'Personalized Nurse Calling & 24/7 Concierge Support',
                    'Laundry & Housekeeping Services for Accompanying Family',
                ],
                'Food Services' => [
                    'Customized Clinical Dietician Meals (Diabetic, Renal, Low Sodium)',
                    'Multi-Cuisine International Cafeteria (Arabic, Continental, Asian)',
                    'Halal-Certified Meals Prepared in Dedicated Dietary Kitchens',
                    'In-Room Dining for Patients & Visitors',
                ],
                'Money Matters' => [
                    'International Currency Exchange Counter at Main Lobby',
                    'Multi-Currency Payment Gateways (USD, EUR, GBP, AED, INR)',
                    'Direct International Medical Insurance TPA Cashless Desk',
                    'Transparent Itemized Medical Billing & Treatment Cost Estimates',
                ],
                'Patient Support' => [
                    'Dedicated International Patient Relationship Manager (24/7)',
                    'Medical Visa Invitation Letter Assistance (within 24 Hours)',
                    'FRRO / Police Registration Guidance for Foreign Nationals',
                    'Post-Discharge Tele-Consultation & Medication Dispatch',
                ],
                'Transportation' => [
                    'Complimentary Airport Pickup & Drop in Private Ambulances / Cabs',
                    'Local Commute & Hotel Transit Shuttle Service',
                    'Air Ambulance Evacuation & Repatriation Desk',
                    '24/7 Dedicated Emergency Hospital Fleet',
                ],
                'Diagnostics' => [
                    '3-Tesla Multi-Parametric MRI & Ultra High-Speed 128-Slice CT',
                    'Full Body Digital PET-CT for Oncology Staging',
                    'Automated 24/7 Clinical Pathology & Microbiology Lab',
                    'Comprehensive Genetic & Molecular Biology Screening',
                ],
                'Language Support' => [
                    'Full-time Arabic, Russian, French, and Bengali Medical Interpreters',
                    'Translated Discharge Summaries & Prescriptions',
                    'Multilingual Nursing Staff & Cultural Care Coordinators',
                ],
            ];

            foreach ($servicesByCategory as $cat => $names) {
                foreach ($names as $name) {
                    Service::firstOrCreate([
                        'hospital_id' => $hosp->id,
                        'category' => $cat,
                        'name' => $name,
                    ]);
                }
            }

            // 6. Seed Location Guide
            LocationGuide::firstOrCreate([
                'hospital_id' => $hosp->id,
            ], [
                'description' => '<h3>Arrival, Airport Connectivity & Neighborhood Guide</h3><p>Conveniently situated in a prime medical corridor with seamless transit access for international patients and their families.</p><h4>Airport & Transit Proximity:</h4><ul><li><strong>International Airport (DEL):</strong> Approximately 18 km (20 to 25 minutes by express highway). Complimentary airport pickup available.</li><li><strong>Nearest Metro Station:</strong> 5 minutes walking distance with direct connectivity to city center.</li><li><strong>Inter-City Railway Terminals:</strong> 30 minutes drive via signal-free corridors.</li></ul><h4>Neighborhood & Patient Accommodation:</h4><ul><li><strong>Hotels & Guest Houses:</strong> Over 15 vetted 3-star, 4-star, and luxury 5-star partner hotels within a 1 to 3 km radius offering special medical patient rates.</li><li><strong>Banking & Pharmacy:</strong> Multiple 24/7 ATMs, foreign exchange kiosks, and round-the-clock pharmacies situated within 200 meters.</li></ul>',
            ]);

            // 7. Seed Reviews
            $sampleReviews = [
                [
                    'name' => 'Sheikh Fahad Al-Otaibi',
                    'rating' => 5,
                    'review' => 'Exceptional care from the cardiology team. From airport reception to quadruple bypass surgery and rehabilitation, everything was handled with utmost professionalism. The Arabic translator was with us 24/7.',
                    'designation_or_country' => 'Riyadh, Saudi Arabia • Cardiac Bypass Patient',
                    'status' => true,
                ],
                [
                    'name' => 'Elena Rostova',
                    'rating' => 5,
                    'review' => 'Underwent robotic knee replacement. The recovery was remarkably quick and painless. World-class technology and very compassionate nursing care.',
                    'designation_or_country' => 'Tashkent, Uzbekistan • Orthopedic Patient',
                    'status' => true,
                ],
                [
                    'name' => 'James M. Kariuki',
                    'rating' => 5,
                    'review' => 'Traveled from Nairobi for liver transplant consultation. The transparency in pricing, speed of diagnostic workups, and medical visa support were outstanding.',
                    'designation_or_country' => 'Nairobi, Kenya • Hepatology Consultation',
                    'status' => true,
                ],
            ];

            foreach ($sampleReviews as $rev) {
                Review::firstOrCreate([
                    'hospital_id' => $hosp->id,
                    'name' => $rev['name'],
                ], [
                    'rating' => $rev['rating'],
                    'review' => $rev['review'],
                    'designation_or_country' => $rev['designation_or_country'],
                    'status' => $rev['status'],
                ]);
            }
        }
    }
}
