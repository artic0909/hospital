<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\DoctorSpeciality;
use App\Models\Facility;
use App\Models\Hospital;
use App\Models\HospitalCategory;
use App\Models\HospitalImage;
use App\Models\Infrustructure;
use App\Models\LocationGuide;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ComprehensiveHospitalAndDoctorSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Countries
        $india = Country::firstOrCreate(['name' => 'India']);
        $uae = Country::firstOrCreate(['name' => 'United Arab Emirates']);
        $turkey = Country::firstOrCreate(['name' => 'Turkey']);
        $thailand = Country::firstOrCreate(['name' => 'Thailand']);

        // 2. States
        $delhi = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Delhi NCR']);
        $maharashtra = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Maharashtra']);
        $karnataka = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Karnataka']);
        $dubaiState = State::firstOrCreate(['country_id' => $uae->id, 'name' => 'Dubai']);
        $istanbulState = State::firstOrCreate(['country_id' => $turkey->id, 'name' => 'Istanbul']);
        $bangkokState = State::firstOrCreate(['country_id' => $thailand->id, 'name' => 'Bangkok']);

        // 3. Cities
        $newDelhi = City::firstOrCreate(['state_id' => $delhi->id, 'name' => 'New Delhi']);
        $gurgaon = City::firstOrCreate(['state_id' => $delhi->id, 'name' => 'Gurgaon']);
        $mumbai = City::firstOrCreate(['state_id' => $maharashtra->id, 'name' => 'Mumbai']);
        $bangalore = City::firstOrCreate(['state_id' => $karnataka->id, 'name' => 'Bangalore']);
        $dubai = City::firstOrCreate(['state_id' => $dubaiState->id, 'name' => 'Dubai']);
        $istanbul = City::firstOrCreate(['state_id' => $istanbulState->id, 'name' => 'Istanbul']);
        $bangkok = City::firstOrCreate(['state_id' => $bangkokState->id, 'name' => 'Bangkok']);

        // 4. Categories
        $superSpec = HospitalCategory::firstOrCreate(['name' => 'Super-Specialty Hospital']);
        $multiSpec = HospitalCategory::firstOrCreate(['name' => 'Multi-Specialty Hospital']);
        $jciCenter = HospitalCategory::firstOrCreate(['name' => 'JCI Accredited Center of Excellence']);

        // 5. Hospital Data Set
        $hospitalsData = [
            [
                'name' => 'Indraprastha Apollo Hospitals',
                'slug' => 'indraprastha-apollo-hospitals',
                'contact' => '+91 11 26925858',
                'email' => 'assistance@apollohospitals.com',
                'country_id' => $india->id,
                'state_id' => $delhi->id,
                'city_id' => $newDelhi->id,
                'address' => 'Sarita Vihar, Delhi Mathura Road, New Delhi, Delhi 110076',
                'establish_year' => 1996,
                'hospital_category_id' => $superSpec->id,
                'no_of_bed' => 710,
                'about' => 'Indraprastha Apollo Hospitals, New Delhi is India\'s first hospital to be internationally accredited by JCI consecutively 5 times. It is a multi-specialty tertiary care hospital with over 710 beds, housing centers of excellence in Cardiology, Oncology, Organ Transplants, Neurology, and Robotic Surgery. The hospital has performed over 500 pediatric liver transplants and has a 99.6% clinical success rate in beating-heart bypass surgeries.',
                'password' => Hash::make('12345678'),
                'status' => true,
                'doctors' => [
                    [
                        'name' => 'Ashok Seth',
                        'slug' => 'dr-ashok-seth',
                        'designation' => 'Chairman - Cardiology & Chief Interventional Cardiologist',
                        'spaciality' => 'Interventional Cardiology',
                        'experience' => 35,
                        'OPD_fee' => 2200.00,
                        'surgeries' => '20,000+ Angioplasties & TAVR',
                        'education' => '<p><strong>MBBS</strong> - JN Medical College, AMU, Aligarh (1979)</p><p><strong>MD</strong> - AMU, Aligarh (1982)</p><p><strong>FRCP</strong> - London, Edinburgh, Glasgow</p><p><strong>FACC, FSCAI, FESC</strong> - American College of Cardiology & European Society of Cardiology</p>',
                        'awards' => '<p>&bull; <strong>Padma Bhushan</strong> awarded by President of India (2015)</p><p>&bull; <strong>Padma Shri</strong> awarded by President of India (2003)</p><p>&bull; Lifetime Achievement Award in Interventional Cardiology</p>',
                        'work_experiance' => '<p>Chairman of Cardiology at <strong>Fortis / Apollo Healthcare</strong></p><p>Former Consultant Cardiologist at <strong>Queen Elizabeth Hospital, Birmingham</strong>, UK</p><p>President of Cardiological Society of India (CSI)</p>',
                    ],
                    [
                        'name' => 'Subhash Gupta',
                        'slug' => 'dr-subhash-gupta',
                        'designation' => 'Chairman - Liver & Hepato-Pancreato-Biliary Surgery',
                        'spaciality' => 'Liver Transplant & Hepatic Care',
                        'experience' => 30,
                        'OPD_fee' => 2500.00,
                        'surgeries' => '3,000+ Liver Transplants',
                        'education' => '<p><strong>MBBS</strong> - All India Institute of Medical Sciences (AIIMS), New Delhi (1987)</p><p><strong>MS (General Surgery)</strong> - AIIMS, New Delhi (1990)</p><p><strong>Fellowship in Liver Transplantation</strong> - Queen Elizabeth Hospital, Birmingham, UK</p>',
                        'awards' => '<p>&bull; Dr. B.C. Roy National Award by Medical Council of India</p><p>&bull; Gold Medal in Surgery by AIIMS</p>',
                        'work_experiance' => '<p>Chief of Liver Transplantation at <strong>Indraprastha Apollo Hospitals</strong></p><p>Former Director of Liver Care at <strong>Max Healthcare</strong></p>',
                    ],
                    [
                        'name' => 'Y K Mishra',
                        'slug' => 'dr-y-k-mishra',
                        'designation' => 'Head of Cardiac Sciences & Chief Cardiothoracic Surgeon',
                        'spaciality' => 'Cardiothoracic Surgery',
                        'experience' => 44,
                        'OPD_fee' => 2000.00,
                        'surgeries' => 'Over 19,000+ Surgeries',
                        'education' => '<p><strong>MBBS</strong> - S.S. Medical College, Rewa, Madhya Pradesh (1979)</p><p><strong>MS (General Surgery)</strong> - S.S. Medical College, Rewa (1983)</p><p><strong>M.Ch (Cardiothoracic Surgery)</strong> - King George\'s Medical University, Lucknow (1986)</p><p><strong>Fellowship in Cardiovascular Surgery</strong> - Thorax Centre, University Hospital Rotterdam, Netherlands</p>',
                        'awards' => '<p>&bull; Rashtriya Ratan Award by International Study Circle (2005)</p><p>&bull; Lifetime Achievement Award by World Congress on Clinical & Preventive Cardiology conferred by Dr A.P.J. Abdul Kalam (2006)</p><p>&bull; Honoris Causa Doctorate (Doctor of Science)</p>',
                        'work_experiance' => '<p>Head of Cardiac Sciences at <strong>Indraprastha Apollo & Manipal Hospitals</strong></p><p>Director & Head of Cardiac Surgery at <strong>Fortis Escorts Heart Institute</strong> (16+ years)</p><p>Senior Consultant Cardiothoracic Surgeon at leading international institutes</p>',
                    ],
                ],
            ],
            [
                'name' => 'Medanta - The Medicity',
                'slug' => 'medanta-the-medicity',
                'contact' => '+91 124 4141414',
                'email' => 'info@medanta.org',
                'country_id' => $india->id,
                'state_id' => $delhi->id,
                'city_id' => $gurgaon->id,
                'address' => 'CH Bakhtawar Singh Road, Sector 38, Gurugram, Haryana 122001',
                'establish_year' => 2009,
                'hospital_category_id' => $superSpec->id,
                'no_of_bed' => 1250,
                'about' => 'Medanta is one of India\'s largest multi-super specialty institutes. Founded by Dr. Naresh Trehan, it houses centers of excellence for Heart, Neurosciences, Bone & Joint, Kidney & Urology, Cancer and Liver Transplantation with JCI and NABH accreditations.',
                'password' => Hash::make('12345678'),
                'status' => true,
                'doctors' => [
                    [
                        'name' => 'Naresh Trehan',
                        'slug' => 'dr-naresh-trehan',
                        'designation' => 'Chairman & Chief Cardiac Surgeon',
                        'spaciality' => 'Cardiothoracic Surgery',
                        'experience' => 38,
                        'OPD_fee' => 2500.00,
                        'surgeries' => '48,000+ Open Heart Surgeries',
                        'education' => '<p><strong>MBBS</strong> - King George\'s Medical University, Lucknow (1968)</p><p><strong>Diplomate</strong> - American Board of Surgery, USA (1977)</p><p><strong>Diplomate</strong> - American Board of Cardiothoracic Surgery, USA (1979)</p>',
                        'awards' => '<p>&bull; <strong>Padma Bhushan</strong> awarded by Government of India (2001)</p><p>&bull; <strong>Padma Shri</strong> awarded by Government of India (1991)</p><p>&bull; Dr. B.C. Roy National Award</p>',
                        'work_experiance' => '<p>Founder & Chairman at <strong>Medanta - The Medicity</strong> (2009 - Present)</p><p>Former Executive Director & Founder at <strong>Escorts Heart Institute</strong> (1988 - 2007)</p><p>Assistant Professor of Surgery at <strong>New York University Medical Center</strong>, Manhattan, USA (1981 - 1988)</p>',
                    ],
                    [
                        'name' => 'Arvinder Singh Soin',
                        'slug' => 'dr-arvinder-singh-soin',
                        'designation' => 'Chairman - Liver Transplantation & Hepatobiliary Sciences',
                        'spaciality' => 'Hepatology & Liver Transplant',
                        'experience' => 32,
                        'OPD_fee' => 2800.00,
                        'surgeries' => '3,500+ Liver Transplants',
                        'education' => '<p><strong>MBBS</strong> - All India Institute of Medical Sciences (AIIMS), New Delhi (1986)</p><p><strong>MS (Surgery)</strong> - AIIMS, New Delhi (1989)</p><p><strong>FRCS</strong> - Royal College of Surgeons of Edinburgh & Glasgow, UK</p>',
                        'awards' => '<p>&bull; <strong>Padma Shri</strong> by President of India (2010)</p><p>&bull; RD Birla Award for Outstanding Clinician of the Year</p>',
                        'work_experiance' => '<p>Chairman of Liver Transplant at <strong>Medanta - The Medicity</strong></p><p>Former Senior Consultant at <strong>Sir Ganga Ram Hospital</strong>, New Delhi</p><p>Fellow & Faculty at <strong>Addenbrooke\'s Hospital, Cambridge University</strong>, UK</p>',
                    ],
                ],
            ],
            [
                'name' => 'American Hospital Dubai',
                'slug' => 'american-hospital-dubai',
                'contact' => '+971 4 3775500',
                'email' => 'info@ahdubai.com',
                'country_id' => $uae->id,
                'state_id' => $dubaiState->id,
                'city_id' => $dubai->id,
                'address' => 'Oud Metha Road, Bur Dubai, Dubai, United Arab Emirates',
                'establish_year' => 1996,
                'hospital_category_id' => $jciCenter->id,
                'no_of_bed' => 254,
                'about' => 'Premier private hospital in Dubai providing American standards of healthcare, Mayo Clinic Care Network member, serving patients across the Middle East, Africa, and Central Asia.',
                'password' => Hash::make('12345678'),
                'status' => true,
                'doctors' => [
                    [
                        'name' => 'Tarek Dufan',
                        'slug' => 'dr-tarek-dufan',
                        'designation' => 'Chief Medical Officer & Director of Radiation Oncology',
                        'spaciality' => 'Oncology & Cancer Care',
                        'experience' => 24,
                        'OPD_fee' => 3200.00,
                        'surgeries' => '5,000+ Radiation Oncology Cases',
                        'education' => '<p><strong>MD</strong> - Tripoli University</p><p><strong>Residency in Radiation Oncology</strong> - McGill University, Canada</p><p><strong>Fellowship</strong> - Cross Cancer Institute, Canada</p>',
                        'awards' => '<p>&bull; Excellence in Clinical Leadership - Dubai Health Authority</p>',
                        'work_experiance' => '<p>Chief Medical Officer at <strong>American Hospital Dubai</strong></p><p>Former Staff Radiation Oncologist at <strong>CancerCare Manitoba</strong>, Canada</p>',
                    ],
                ],
            ],
        ];

        // 6. Facilities master template
        $facilitiesList = [
            '24x7 Emergency & Trauma Center',
            'Advanced Robotic Surgery Unit (da Vinci Xi)',
            '128-Slice Cardiac CT & 3T MRI Suite',
            'Comprehensive Organ Transplant ICU',
            'Digital Biplane Cath Lab',
            'Blood Bank with Apheresis Support',
            'Dedicated Bone Marrow Transplant Unit',
            'In-house Clinical Diagnostic Laboratory',
            'Ambulance Services with Life Support',
            'Full-time Pharmacy & Medical Dispensary',
        ];

        // 7. Services by Category template (matches frontend tabs)
        $servicesByCategory = [
            'Comfort During Stay' => [
                'Private Deluxe & Suite Rooms with Attendant Couch',
                'High-Speed Wi-Fi & Smart TV in Patient Rooms',
                'Personalized Nurse Calling & 24/7 Concierge Support',
                'Laundry & Housekeeping Services for Accompanying Family',
                'Business Centre Services & Fax/Photocopy',
                'Café & In-room Dining Services',
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

        // 8. Image Gallery template
        $galleryImages = [
            ['title' => 'Main Hospital Entrance & Emergency Drop', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
            ['title' => 'Advanced Cardiac Surgery Theater', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
            ['title' => 'Executive Patient Suite & Recovery Lounge', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
            ['title' => 'Diagnostic Imaging & 3T MRI Suite', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
            ['title' => 'International Patient Lounge & Concierge Desk', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
            ['title' => 'Pediatric Intensive Care Unit (PICU)', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
        ];

        // 9. Standard weekly schedule slots
        $weeklySlots = [
            ['day' => 'Monday', 'time_from' => '10:00 AM', 'time_to' => '01:00 PM'],
            ['day' => 'Tuesday', 'time_from' => '10:00 AM', 'time_to' => '01:00 PM'],
            ['day' => 'Wednesday', 'time_from' => '10:00 AM', 'time_to' => '01:00 PM'],
            ['day' => 'Thursday', 'time_from' => '02:00 PM', 'time_to' => '05:00 PM'],
            ['day' => 'Friday', 'time_from' => '10:00 AM', 'time_to' => '01:00 PM'],
            ['day' => 'Saturday', 'time_from' => '10:00 AM', 'time_to' => '01:30 PM'],
        ];

        // Loop and seed all hospital records
        foreach ($hospitalsData as $hData) {
            $doctorsData = $hData['doctors'] ?? [];
            unset($hData['doctors']);

            if (empty($hData['code'])) {
                $hData['code'] = Hospital::generateHospitalCode();
            }

            $hospital = Hospital::updateOrCreate(
                ['name' => $hData['name']],
                $hData
            );

            // Seed Facilities
            foreach ($facilitiesList as $facName) {
                Facility::firstOrCreate([
                    'hospital_id' => $hospital->id,
                    'name' => $facName,
                ]);
            }

            // Seed Gallery Images
            foreach ($galleryImages as $img) {
                HospitalImage::firstOrCreate([
                    'hospital_id' => $hospital->id,
                    'title' => $img['title'],
                ], [
                    'image' => $img['image'],
                ]);
            }

            // Seed Infrastructure
            Infrustructure::updateOrCreate([
                'hospital_id' => $hospital->id,
            ], [
                'description' => '<p>' . $hospital->name . ' is equipped with cutting-edge medical infrastructure, over <strong>' . number_format($hospital->no_of_bed) . ' certified patient beds</strong>, modern modular surgical suites, and advanced critical care ICUs with HEPA laminar air-flow systems.</p><h4>Key Infrastructure Highlights:</h4><ul><li><strong>Robotic Surgical Suite:</strong> Dual-console da Vinci Xi system for cardiac, urological, and bariatric precision surgery.</li><li><strong>Critical Care Architecture:</strong> Dedicated Coronary Care Unit (CCU), Medical ICU, Surgical ICU, and Pediatric & Neonatal ICUs.</li><li><strong>24/7 Level-1 Trauma & Emergency:</strong> Round-the-clock emergency triage, on-site diagnostics, and air ambulance coordination.</li></ul>',
            ]);

            // Seed Location Guide
            LocationGuide::updateOrCreate([
                'hospital_id' => $hospital->id,
            ], [
                'description' => '<h3>Airport Connectivity & Neighborhood</h3><p>Situated in a prime medical corridor with seamless transit access for international patients and their accompanying families.</p><h4>Airport & Transit:</h4><ul><li><strong>International Airport:</strong> Approximately 15 to 20 km (25 minutes express commute). Complimentary airport pickup available for international patients.</li><li><strong>Metro Station & City Rail:</strong> Within 5 to 10 minutes walking distance.</li></ul><h4>Patient Accommodation:</h4><ul><li>Over 15 vetted 3-star, 4-star, and luxury 5-star partner hotels situated within 1 to 3 km offering special medical patient rates.</li></ul>',
            ]);

            // Seed Services
            foreach ($servicesByCategory as $catName => $serviceItems) {
                foreach ($serviceItems as $item) {
                    Service::firstOrCreate([
                        'hospital_id' => $hospital->id,
                        'category' => $catName,
                        'name' => $item,
                    ]);
                }
            }

            // Seed Reviews
            $sampleReviews = [
                [
                    'name' => 'Sheikh Fahad Al-Otaibi',
                    'rating' => 5,
                    'review' => 'Exceptional care from the medical team. From airport reception to quadruple bypass surgery and rehabilitation, everything was handled with utmost professionalism. The Arabic translator was with us 24/7.',
                    'designation_or_country' => 'Riyadh, Saudi Arabia • International Patient',
                    'status' => true,
                ],
                [
                    'name' => 'Elena Rostova',
                    'rating' => 5,
                    'review' => 'Underwent robotic surgery at ' . $hospital->name . '. The recovery was remarkably quick and painless. World-class technology and very compassionate nursing care.',
                    'designation_or_country' => 'Tashkent, Uzbekistan • Verified Patient',
                    'status' => true,
                ],
                [
                    'name' => 'James M. Kariuki',
                    'rating' => 5,
                    'review' => 'Traveled from Nairobi for specialized treatment. The transparency in pricing, speed of diagnostic workups, and medical visa support were outstanding.',
                    'designation_or_country' => 'Nairobi, Kenya • Medical Traveler',
                    'status' => true,
                ],
            ];

            foreach ($sampleReviews as $rev) {
                Review::firstOrCreate([
                    'hospital_id' => $hospital->id,
                    'name' => $rev['name'],
                ], $rev);
            }

            // Seed Doctors for this Hospital
            foreach ($doctorsData as $dData) {
                $doc = Doctor::updateOrCreate(
                    [
                        'hospital_id' => $hospital->id,
                        'name' => $dData['name'],
                    ],
                    array_merge($dData, ['status' => true])
                );

                // Seed Doctor Weekly Schedules
                Schedule::where('doctor_id', $doc->id)->delete();
                foreach ($weeklySlots as $slot) {
                    Schedule::create([
                        'doctor_id' => $doc->id,
                        'day' => $slot['day'],
                        'time_from' => $slot['time_from'],
                        'time_to' => $slot['time_to'],
                    ]);
                }
            }
        }
    }
}

