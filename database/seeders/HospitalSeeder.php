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
use Illuminate\Support\Str;

class HospitalSeeder extends Seeder
{
    /**
     * Run the complete database seed for Hospitals, Categories, Doctors, and Relational Sub-Modules.
     */
    public function run(): void
    {
        $this->command?->info('====================================================');
        $this->command?->info('Starting Comprehensive Hospital & Doctor Seeder...');
        $this->command?->info('====================================================');

        // 1. Seed Hospital Categories
        $categories = $this->seedCategories();

        // 2. Seed Geographies (Countries, States, Cities)
        $geo = $this->seedGeographies();

        // 3. Seed Doctor Specialities
        $this->seedDoctorSpecialities();

        // 4. Seed Hospitals, Doctors & All Related Modules
        $this->seedHospitalsAndDoctors($categories, $geo);

        $this->command?->info('====================================================');
        $this->command?->info('Hospital & Doctor Seeder Completed Successfully!');
        $this->command?->info('====================================================');
    }

    /**
     * 1. Hospital Categories
     */
    protected function seedCategories(): array
    {
        $categoryNames = [
            'superSpec' => 'Super-Specialty Hospital',
            'multiSpec' => 'Multi-Specialty Hospital',
            'jciCenter' => 'JCI Accredited Center of Excellence',
            'cancerCenter' => 'Comprehensive Cancer Center',
            'quaternary' => 'Quaternary Care Medical Institute',
            'university' => 'Tertiary Care University Hospital',
        ];

        $categories = [];
        foreach ($categoryNames as $key => $name) {
            $categories[$key] = HospitalCategory::firstOrCreate(['name' => $name]);
        }

        $this->command?->info('  ✓ Seeded ' . count($categories) . ' hospital categories.');
        return $categories;
    }

    /**
     * 2. Countries, States, and Cities
     */
    protected function seedGeographies(): array
    {
        // Countries with header display flags
        $india = Country::firstOrCreate(['name' => 'India'], ['show_in_header' => true]);
        $india->update(['show_in_header' => true]);

        $uae = Country::firstOrCreate(['name' => 'United Arab Emirates'], ['show_in_header' => true]);
        $uae->update(['show_in_header' => true]);

        $turkey = Country::firstOrCreate(['name' => 'Turkey'], ['show_in_header' => true]);
        $turkey->update(['show_in_header' => true]);

        $thailand = Country::firstOrCreate(['name' => 'Thailand'], ['show_in_header' => true]);
        $thailand->update(['show_in_header' => true]);

        // States
        $delhiState = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Delhi NCR']);
        $maharashtraState = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Maharashtra']);
        $karnatakaState = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Karnataka']);
        $dubaiState = State::firstOrCreate(['country_id' => $uae->id, 'name' => 'Dubai']);
        $istanbulState = State::firstOrCreate(['country_id' => $turkey->id, 'name' => 'Istanbul']);
        $bangkokState = State::firstOrCreate(['country_id' => $thailand->id, 'name' => 'Bangkok']);

        // Cities
        $newDelhi = City::firstOrCreate(['state_id' => $delhiState->id, 'name' => 'New Delhi']);
        $gurgaon = City::firstOrCreate(['state_id' => $delhiState->id, 'name' => 'Gurgaon']);
        $mumbai = City::firstOrCreate(['state_id' => $maharashtraState->id, 'name' => 'Mumbai']);
        $bangalore = City::firstOrCreate(['state_id' => $karnatakaState->id, 'name' => 'Bangalore']);
        $dubaiCity = City::firstOrCreate(['state_id' => $dubaiState->id, 'name' => 'Dubai']);
        $istanbulCity = City::firstOrCreate(['state_id' => $istanbulState->id, 'name' => 'Istanbul']);
        $bangkokCity = City::firstOrCreate(['state_id' => $bangkokState->id, 'name' => 'Bangkok']);

        $this->command?->info('  ✓ Seeded Geographies (Countries, States, Cities).');

        return compact(
            'india', 'uae', 'turkey', 'thailand',
            'delhiState', 'maharashtraState', 'karnatakaState', 'dubaiState', 'istanbulState', 'bangkokState',
            'newDelhi', 'gurgaon', 'mumbai', 'bangalore', 'dubaiCity', 'istanbulCity', 'bangkokCity'
        );
    }

    /**
     * 3. Doctor Specialities with Position & Description
     */
    protected function seedDoctorSpecialities(): void
    {
        $specialities = [
            1 => [
                'name' => 'Cardiology & Heart Care',
                'description' => 'Minimally invasive bypass, valve repair, angioplasty & pediatric heart care.',
            ],
            2 => [
                'name' => 'Oncology & Cancer Care',
                'description' => 'Targeted immunotherapy, robotic surgical oncology & precision therapies.',
            ],
            3 => [
                'name' => 'Neurosurgery & Brain Care',
                'description' => 'Micro-neurosurgical procedures, cranial tumor care & neuro-navigation.',
            ],
            4 => [
                'name' => 'Orthopedics & Joint Care',
                'description' => 'Robotic knee & hip replacements, arthroscopy & joint restoration.',
            ],
            5 => [
                'name' => 'Hepatology & Liver Transplant',
                'description' => 'High-success living donor transplants & complex hepato-biliary care.',
            ],
            6 => [
                'name' => 'Nephrology & Kidney Care',
                'description' => 'Advanced renal transplantation, dialysis access & comprehensive renal care.',
            ],
            7 => [
                'name' => 'Spine Surgery & Endoscopy',
                'description' => 'Endoscopic disc surgery, spinal deformity correction & motion preservation.',
            ],
            8 => [
                'name' => 'IVF & Reproductive Care',
                'description' => 'Advanced IVF/ICSI cycles, fertility preservation & high success rates.',
            ],
            9 => [
                'name' => 'Gynecology & Women\'s Health',
                'description' => 'Specialized women\'s health, laparoscopic gynecology & pelvic care.',
            ],
            10 => [
                'name' => 'Cosmetic & Plastic Surgery',
                'description' => 'Aesthetic facial refinement, hair restoration & body sculpting.',
            ],
            11 => [
                'name' => 'Bone Marrow & Stem Cell',
                'description' => 'Autologous & allogeneic stem cell therapies for blood disorders.',
            ],
            12 => [
                'name' => 'Bariatrics & Weight Loss',
                'description' => 'Minimally invasive gastric sleeve, bypass & metabolic wellness care.',
            ],
        ];

        foreach ($specialities as $pos => $spec) {
            DoctorSpeciality::updateOrCreate(
                ['name' => $spec['name']],
                [
                    'description' => $spec['description'],
                    'position' => $pos,
                ]
            );
        }

        $this->command?->info('  ✓ Seeded ' . count($specialities) . ' doctor specialities with positions.');
    }

    /**
     * 4. Seed Hospitals, Doctors, Schedules, Facilities, Services, Infrastructure, Images, Guides, Reviews
     */
    protected function seedHospitalsAndDoctors(array $cat, array $geo): void
    {
        // 10 Standard Facilities
        $facilitiesList = [
            '24x7 Emergency & Level-1 Trauma Center',
            'Advanced Robotic Surgery Unit (da Vinci Xi Dual Console)',
            'Ultra High-Speed 128-Slice Cardiac CT & 3-Tesla Silent MRI',
            'Dedicated Organ Transplant Intensive Care Unit (ICU)',
            'Digital Biplane Cath Lab with Fractional Flow Reserve (FFR)',
            'In-house Blood Bank with Apheresis & Component Separation',
            'Bone Marrow Transplant Unit with HEPA Positive-Pressure Airflow',
            'Full-Spectrum Clinical Diagnostic Pathology & Genetics Lab',
            'Advanced Critical Care Fleet & Dedicated Life Support Ambulances',
            '24/7 In-House International Pharmacy & Dispensary',
        ];

        // 7 Categorized Services (matches frontend tabs)
        $servicesByCategory = [
            'Comfort During Stay' => [
                'Presidential & Deluxe Suites with Attendant Living Quarters',
                'High-Speed Wi-Fi & Smart TV with International Channels',
                'Personalized Nurse Calling & 24/7 Dedicated Concierge Support',
                'Laundry & Housekeeping Services for Accompanying Family',
                'Executive Business Center with Printing, Scanning & Workstations',
                'In-room Dining & Dedicated International Room Service',
            ],
            'Food Services' => [
                'Clinical Dietician Customized Meals (Diabetic, Renal, Low Sodium)',
                'Multi-Cuisine International Cafeteria (Arabic, Continental, Asian)',
                'Halal-Certified Meals Prepared in Dedicated Dietary Kitchens',
                'Specialized Vegetarian and Vegan Culinary Options',
            ],
            'Money Matters' => [
                'Government-Approved Currency Exchange Counter in Hospital Lobby',
                'Multi-Currency Payment Processing (USD, EUR, GBP, AED, INR)',
                'Direct Cashless International Insurance TPA Helpdesk',
                'Transparent Itemized Billing & Detailed Pre-Admission Estimates',
            ],
            'Patient Support' => [
                'Dedicated International Patient Relationship Manager (24/7)',
                'Official Medical Visa Invitation Letter Issuance within 12-24 Hours',
                'Local Police & FRRO Registration Assistance for Foreign Nationals',
                'Post-Discharge Tele-Consultation & Home Medication Courier Dispatch',
            ],
            'Transportation' => [
                'Complimentary Airport Pick-Up & Drop in Private Ambulances or Cabs',
                'Dedicated Transit Shuttle Between Hospital and Partner Hotels',
                'Air Ambulance Evacuation & Repatriation Desk with Tarmac Access',
                '24/7 Hospital Fleet for Emergency Transfers',
            ],
            'Diagnostics' => [
                '3-Tesla Multi-Parametric MRI & Ultra High-Speed 128-Slice CT',
                'Full Body Digital PET-CT for Precision Oncology Staging',
                'Automated 24/7 Clinical Pathology & Microbiology Diagnostic Lab',
                'Comprehensive Genetic & Next-Generation Molecular Sequencing',
            ],
            'Language Support' => [
                'Full-time Arabic, Russian, French, and Bengali Medical Interpreters',
                'Translated Discharge Summaries & Multilingual Medication Schedules',
                'Multilingual Nursing Staff & Cultural Care Coordinators',
            ],
        ];

        // Weekly OPD Schedules
        $weeklySlots = [
            ['day' => 'Monday', 'time_from' => '10:00 AM', 'time_to' => '01:00 PM'],
            ['day' => 'Tuesday', 'time_from' => '10:00 AM', 'time_to' => '01:00 PM'],
            ['day' => 'Wednesday', 'time_from' => '10:00 AM', 'time_to' => '01:00 PM'],
            ['day' => 'Thursday', 'time_from' => '02:00 PM', 'time_to' => '05:00 PM'],
            ['day' => 'Friday', 'time_from' => '10:00 AM', 'time_to' => '01:00 PM'],
            ['day' => 'Saturday', 'time_from' => '10:00 AM', 'time_to' => '01:30 PM'],
        ];

        // Complete Hospitals Dataset
        $hospitalsData = [
            // 1. Indraprastha Apollo Hospitals (New Delhi, India)
            [
                'name' => 'Indraprastha Apollo Hospitals',
                'slug' => 'indraprastha-apollo-hospitals',
                'contact' => '+91 11 26925858',
                'email' => 'assistance@apollohospitals.com',
                'country_id' => $geo['india']->id,
                'state_id' => $geo['delhiState']->id,
                'city_id' => $geo['newDelhi']->id,
                'address' => 'Sarita Vihar, Delhi Mathura Road, New Delhi, Delhi 110076',
                'establish_year' => 1996,
                'hospital_category_id' => $cat['superSpec']->id,
                'no_of_bed' => 710,
                'about' => 'Indraprastha Apollo Hospitals, New Delhi is India\'s first hospital to be internationally accredited by JCI consecutively 5 times. It is a multi-specialty tertiary care hospital with over 710 beds, housing centers of excellence in Cardiology, Oncology, Organ Transplants, Neurology, and Robotic Surgery. The hospital has performed over 500 pediatric liver transplants and has a 99.6% clinical success rate in beating-heart bypass surgeries.',
                'gallery' => [
                    ['title' => 'Main Hospital Facade & Arrival Porch', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'State-of-the-Art Robotic Surgical Suite', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Executive Patient Suite & Recovery Room', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Advanced 3-Tesla MRI & Diagnostic Imaging', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'International Patient Lounge & Concierge', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Pediatric Intensive Care Unit (PICU)', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Ashok Seth',
                        'slug' => 'dr-ashok-seth',
                        'designation' => 'Chairman - Cardiology & Chief Interventional Cardiologist',
                        'spaciality' => 'Cardiology & Heart Care',
                        'experience' => 35,
                        'OPD_fee' => 2200.00,
                        'surgeries' => '20,000+ Angioplasties & TAVR',
                        'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - JN Medical College, AMU, Aligarh (1979)</p><p><strong>MD</strong> - AMU, Aligarh (1982)</p><p><strong>FRCP</strong> - London, Edinburgh, Glasgow</p><p><strong>FACC, FSCAI, FESC</strong> - American College of Cardiology & European Society of Cardiology</p>',
                        'awards' => '<p>&bull; <strong>Padma Bhushan</strong> awarded by President of India (2015)</p><p>&bull; <strong>Padma Shri</strong> awarded by President of India (2003)</p><p>&bull; Lifetime Achievement Award in Interventional Cardiology</p>',
                        'work_experiance' => '<p>Chairman of Cardiology at <strong>Fortis / Apollo Healthcare</strong></p><p>Former Consultant Cardiologist at <strong>Queen Elizabeth Hospital, Birmingham</strong>, UK</p><p>President of Cardiological Society of India (CSI)</p>',
                    ],
                    [
                        'name' => 'Subhash Gupta',
                        'slug' => 'dr-subhash-gupta',
                        'designation' => 'Chairman - Liver & Hepato-Pancreato-Biliary Surgery',
                        'spaciality' => 'Hepatology & Liver Transplant',
                        'experience' => 30,
                        'OPD_fee' => 2500.00,
                        'surgeries' => '3,000+ Liver Transplants',
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - All India Institute of Medical Sciences (AIIMS), New Delhi (1987)</p><p><strong>MS (General Surgery)</strong> - AIIMS, New Delhi (1990)</p><p><strong>Fellowship in Liver Transplantation</strong> - Queen Elizabeth Hospital, Birmingham, UK</p>',
                        'awards' => '<p>&bull; Dr. B.C. Roy National Award by Medical Council of India</p><p>&bull; Gold Medal in Surgery by AIIMS</p>',
                        'work_experiance' => '<p>Chief of Liver Transplantation at <strong>Indraprastha Apollo Hospitals</strong></p><p>Former Director of Liver Care at <strong>Max Healthcare</strong></p>',
                    ],
                    [
                        'name' => 'Y K Mishra',
                        'slug' => 'dr-y-k-mishra',
                        'designation' => 'Head of Cardiac Sciences & Chief Cardiothoracic Surgeon',
                        'spaciality' => 'Cardiology & Heart Care',
                        'experience' => 44,
                        'OPD_fee' => 2000.00,
                        'surgeries' => 'Over 19,000+ Surgeries',
                        'image' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - S.S. Medical College, Rewa, MP (1979)</p><p><strong>MS (General Surgery)</strong> - S.S. Medical College (1983)</p><p><strong>M.Ch (Cardiothoracic Surgery)</strong> - King George\'s Medical University, Lucknow (1986)</p><p><strong>Fellowship</strong> - Thorax Centre, University Hospital Rotterdam, Netherlands</p>',
                        'awards' => '<p>&bull; Rashtriya Ratan Award by International Study Circle</p><p>&bull; Lifetime Achievement Award conferred by Dr. A.P.J. Abdul Kalam</p>',
                        'work_experiance' => '<p>Head of Cardiac Sciences at <strong>Apollo Hospitals</strong></p><p>Director & Head of Cardiac Surgery at <strong>Fortis Escorts Heart Institute</strong> (16+ years)</p>',
                    ],
                ],
            ],

            // 2. Medanta - The Medicity (Gurgaon, Haryana, India)
            [
                'name' => 'Medanta - The Medicity',
                'slug' => 'medanta-the-medicity',
                'contact' => '+91 124 4141414',
                'email' => 'info@medanta.org',
                'country_id' => $geo['india']->id,
                'state_id' => $geo['delhiState']->id,
                'city_id' => $geo['gurgaon']->id,
                'address' => 'CH Bakhtawar Singh Road, Sector 38, Gurugram, Haryana 122001',
                'establish_year' => 2009,
                'hospital_category_id' => $cat['quaternary']->id,
                'no_of_bed' => 1250,
                'about' => 'Medanta is one of India\'s largest multi-super specialty institutes. Founded by Dr. Naresh Trehan, it houses centers of excellence for Heart, Neurosciences, Bone & Joint, Kidney & Urology, Cancer and Liver Transplantation with JCI and NABH accreditations.',
                'gallery' => [
                    ['title' => 'Medanta 43-Acre Medical Campus Aerial View', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Advanced Hybrid Cardiac Cath Lab', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Executive International Inpatient Wing', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'CyberKnife VSI Robotic Radiosurgery Unit', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Naresh Trehan',
                        'slug' => 'dr-naresh-trehan',
                        'designation' => 'Chairman & Chief Cardiac Surgeon',
                        'spaciality' => 'Cardiology & Heart Care',
                        'experience' => 38,
                        'OPD_fee' => 2500.00,
                        'surgeries' => '48,000+ Open Heart Surgeries',
                        'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
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
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - AIIMS, New Delhi (1986)</p><p><strong>MS (Surgery)</strong> - AIIMS, New Delhi (1989)</p><p><strong>FRCS</strong> - Royal College of Surgeons of Edinburgh & Glasgow, UK</p>',
                        'awards' => '<p>&bull; <strong>Padma Shri</strong> by President of India (2010)</p><p>&bull; RD Birla Award for Outstanding Clinician of the Year</p>',
                        'work_experiance' => '<p>Chairman of Liver Transplant at <strong>Medanta - The Medicity</strong></p><p>Former Senior Consultant at <strong>Sir Ganga Ram Hospital</strong>, New Delhi</p><p>Fellow & Faculty at <strong>Addenbrooke\'s Hospital, Cambridge University</strong>, UK</p>',
                    ],
                ],
            ],

            // 3. Fortis Memorial Research Institute (FMRI) (Gurgaon, Haryana, India)
            [
                'name' => 'Fortis Memorial Research Institute (FMRI)',
                'slug' => 'fortis-memorial-research-institute',
                'contact' => '+91 124 4962200',
                'email' => 'fmri@fortishealthcare.com',
                'country_id' => $geo['india']->id,
                'state_id' => $geo['delhiState']->id,
                'city_id' => $geo['gurgaon']->id,
                'address' => 'Sector 44, Opposite HUDA City Centre Metro Station, Gurugram, Haryana 122002',
                'establish_year' => 2013,
                'hospital_category_id' => $cat['superSpec']->id,
                'no_of_bed' => 1000,
                'about' => 'Known as the "Next Generation Hospital", FMRI is a quaternary care hospital with internationally renowned faculty, state-of-the-art diagnostic and clinical technology including 3T digital MRI and Da Vinci surgical robot.',
                'gallery' => [
                    ['title' => 'FMRI Glass Atrium & Main Reception', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Brain Suite with Intra-operative CT & MRI', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Deluxe Suite with Smart Bed Technology', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Vinod Raina',
                        'slug' => 'dr-vinod-raina',
                        'designation' => 'Executive Chairman - Medical Oncology, Hematology & BMT',
                        'spaciality' => 'Oncology & Cancer Care',
                        'experience' => 39,
                        'OPD_fee' => 2600.00,
                        'surgeries' => '600+ Bone Marrow Transplants',
                        'image' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - All India Institute of Medical Sciences (AIIMS), New Delhi</p><p><strong>MD (Medicine)</strong> - AIIMS, New Delhi</p><p><strong>MRCP, FRCP</strong> - Royal College of Physicians, UK</p>',
                        'awards' => '<p>&bull; Pioneer of Autologous Bone Marrow Transplantation in India</p><p>&bull; ICMR Oration Award in Medical Research</p>',
                        'work_experiance' => '<p>Executive Chairman at <strong>Fortis Cancer Institute</strong></p><p>Former Professor & Head of Medical Oncology at <strong>AIIMS, New Delhi</strong> (20+ years)</p>',
                    ],
                    [
                        'name' => 'Sandeep Vaishya',
                        'slug' => 'dr-sandeep-vaishya',
                        'designation' => 'Executive Director - Neurosurgery & CyberKnife Centre',
                        'spaciality' => 'Neurosurgery & Brain Care',
                        'experience' => 33,
                        'OPD_fee' => 2400.00,
                        'surgeries' => '10,000+ Brain & Spine Surgeries',
                        'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - G.R. Medical College, Gwalior</p><p><strong>MS (General Surgery)</strong> - G.R. Medical College</p><p><strong>M.Ch (Neurosurgery)</strong> - AIIMS, New Delhi</p><p><strong>Herbert Krause Medal</strong> in Neuro-Oncology</p>',
                        'awards' => '<p>&bull; Renowned for successful separation of Craniopagus conjoined twins</p><p>&bull; Lifetime Achievement in Minimally Invasive Neurosurgery</p>',
                        'work_experiance' => '<p>Executive Director of Neurosurgery at <strong>FMRI</strong></p><p>Former Faculty of Neurosurgery at <strong>AIIMS, New Delhi</strong></p>',
                    ],
                ],
            ],

            // 4. Max Super Speciality Hospital, Saket (New Delhi, India)
            [
                'name' => 'Max Super Speciality Hospital, Saket',
                'slug' => 'max-super-speciality-hospital-saket',
                'contact' => '+91 11 26515050',
                'email' => 'info@maxhealthcare.com',
                'country_id' => $geo['india']->id,
                'state_id' => $geo['delhiState']->id,
                'city_id' => $geo['newDelhi']->id,
                'address' => '1, 2, Press Enclave Marg, Saket Institutional Area, New Delhi, Delhi 110017',
                'establish_year' => 2006,
                'hospital_category_id' => $cat['cancerCenter']->id,
                'no_of_bed' => 530,
                'about' => 'Max Super Speciality Hospital, Saket is an internationally accredited premier medical facility recognized for comprehensive oncology, advanced neurosciences, robotic orthopedics, and living-donor organ transplant programs.',
                'gallery' => [
                    ['title' => 'Max Saket Main Building & Emergency Bay', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Robotic da Vinci Xi Console in Operation', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Harit Chaturvedi',
                        'slug' => 'dr-harit-chaturvedi',
                        'designation' => 'Chairman - Max Institute of Cancer Care',
                        'spaciality' => 'Oncology & Cancer Care',
                        'experience' => 36,
                        'OPD_fee' => 2500.00,
                        'surgeries' => '12,000+ Complex Surgical Oncology Cases',
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - GSVM Medical College, Kanpur</p><p><strong>MS (General Surgery)</strong> - GSVM Medical College</p><p><strong>M.Ch (Surgical Oncology)</strong> - Dr. MGR Medical University, Chennai</p>',
                        'awards' => '<p>&bull; President of Indian Association of Surgical Oncology (IASO)</p>',
                        'work_experiance' => '<p>Chairman of Oncology at <strong>Max Healthcare</strong></p><p>Former Senior Consultant at <strong>Rajiv Gandhi Cancer Institute</strong></p>',
                    ],
                ],
            ],

            // 5. Kokilaben Dhirubhai Ambani Hospital (Mumbai, Maharashtra, India)
            [
                'name' => 'Kokilaben Dhirubhai Ambani Hospital',
                'slug' => 'kokilaben-dhirubhai-ambani-hospital',
                'contact' => '+91 22 42696969',
                'email' => 'info@kokilabenhospital.com',
                'country_id' => $geo['india']->id,
                'state_id' => $geo['maharashtraState']->id,
                'city_id' => $geo['mumbai']->id,
                'address' => 'Rao Saheb, Achutrao Patwardhan Marg, Four Bungalows, Andheri West, Mumbai 400053',
                'establish_year' => 2009,
                'hospital_category_id' => $cat['multiSpec']->id,
                'no_of_bed' => 750,
                'about' => 'A premier healthcare destination in Mumbai with the only full-time specialist system in India ensuring prompt and dedicated patient care across 15 flagship centers of excellence.',
                'gallery' => [
                    ['title' => 'Kokilaben Hospital Majestic Architecture in Mumbai', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Intraoperative MRI (IMRIS) Suite', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Mihir Bapat',
                        'slug' => 'dr-mihir-bapat',
                        'designation' => 'Director - Spine Surgery',
                        'spaciality' => 'Spine Surgery & Endoscopy',
                        'experience' => 25,
                        'OPD_fee' => 2300.00,
                        'surgeries' => '8,000+ Complex Spine Surgeries',
                        'image' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - King Edward Memorial Hospital (KEM), Mumbai</p><p><strong>MS (Orthopedics)</strong> - KEM Hospital, Mumbai</p><p><strong>Fellowship</strong> - Spine Surgery, Queen Mary Hospital, Hong Kong</p>',
                        'awards' => '<p>&bull; Best Spine Surgeon Award by Association of Spine Surgeons of India (ASSI)</p>',
                        'work_experiance' => '<p>Director of Spine Surgery at <strong>Kokilaben Dhirubhai Ambani Hospital</strong></p>',
                    ],
                ],
            ],

            // 6. Manipal Hospital, Old Airport Road (Bangalore, Karnataka, India)
            [
                'name' => 'Manipal Hospital, Old Airport Road',
                'slug' => 'manipal-hospital-old-airport-road',
                'contact' => '+91 80 25024444',
                'email' => 'info@manipalhospitals.com',
                'country_id' => $geo['india']->id,
                'state_id' => $geo['karnatakaState']->id,
                'city_id' => $geo['bangalore']->id,
                'address' => '98, HAL Old Airport Rd, Kodihalli, Bengaluru, Karnataka 560017',
                'establish_year' => 1991,
                'hospital_category_id' => $cat['superSpec']->id,
                'no_of_bed' => 600,
                'about' => 'Renowned for clinical expertise in oncology, cardiology, organ transplant, and orthopedics with over three decades of trusted medical tourism service.',
                'gallery' => [
                    ['title' => 'Manipal Hospital Bengaluru Campus', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Sudarshan Ballal',
                        'slug' => 'dr-sudarshan-ballal',
                        'designation' => 'Chairman - Manipal Hospitals & Senior Consultant Nephrologist',
                        'spaciality' => 'Nephrology & Kidney Care',
                        'experience' => 38,
                        'OPD_fee' => 2500.00,
                        'surgeries' => '2,500+ Cadaver & Living Donor Kidney Transplants',
                        'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - Kasturba Medical College, Manipal</p><p><strong>Diplomate</strong> - American Board of Internal Medicine, USA</p><p><strong>Diplomate</strong> - American Board of Nephrology, USA</p><p><strong>FRCP</strong> - London</p>',
                        'awards' => '<p>&bull; Rajyotsava Award by Government of Karnataka</p><p>&bull; Teacher of Excellence Award by National Board of Examinations</p>',
                        'work_experiance' => '<p>Chairman at <strong>Manipal Health Enterprises</strong></p><p>Former Clinical Faculty at <strong>St. Louis University School of Medicine</strong>, USA</p>',
                    ],
                ],
            ],

            // 7. American Hospital Dubai (Dubai, UAE)
            [
                'name' => 'American Hospital Dubai',
                'slug' => 'american-hospital-dubai',
                'contact' => '+971 4 3775500',
                'email' => 'info@ahdubai.com',
                'country_id' => $geo['uae']->id,
                'state_id' => $geo['dubaiState']->id,
                'city_id' => $geo['dubaiCity']->id,
                'address' => 'Oud Metha Road, Bur Dubai, Dubai, United Arab Emirates',
                'establish_year' => 1996,
                'hospital_category_id' => $cat['jciCenter']->id,
                'no_of_bed' => 254,
                'about' => 'Premier private hospital in Dubai providing American standards of healthcare, Mayo Clinic Care Network member, serving patients across the Middle East, Africa, and Central Asia.',
                'gallery' => [
                    ['title' => 'American Hospital Dubai Main Entrance', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Comprehensive Cancer Care Center', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Tarek Dufan',
                        'slug' => 'dr-tarek-dufan',
                        'designation' => 'Chief Medical Officer & Director of Radiation Oncology',
                        'spaciality' => 'Oncology & Cancer Care',
                        'experience' => 24,
                        'OPD_fee' => 3200.00,
                        'surgeries' => '5,000+ Radiation Oncology Cases',
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MD</strong> - Tripoli University</p><p><strong>Residency in Radiation Oncology</strong> - McGill University, Canada</p><p><strong>Fellowship</strong> - Cross Cancer Institute, Canada</p>',
                        'awards' => '<p>&bull; Excellence in Clinical Leadership - Dubai Health Authority</p>',
                        'work_experiance' => '<p>Chief Medical Officer at <strong>American Hospital Dubai</strong></p><p>Former Staff Radiation Oncologist at <strong>CancerCare Manitoba</strong>, Canada</p>',
                    ],
                ],
            ],

            // 8. Memorial Sisli Hospital (Istanbul, Turkey)
            [
                'name' => 'Memorial Sisli Hospital',
                'slug' => 'memorial-sisli-hospital',
                'contact' => '+90 212 3146666',
                'email' => 'international@memorial.com.tr',
                'country_id' => $geo['turkey']->id,
                'state_id' => $geo['istanbulState']->id,
                'city_id' => $geo['istanbulCity']->id,
                'address' => 'Piyalepasa Bulvari, 34385 Sisli, Istanbul, Turkey',
                'establish_year' => 2000,
                'hospital_category_id' => $cat['university']->id,
                'no_of_bed' => 200,
                'about' => 'Memorial Sisli was the first hospital in Turkey to receive JCI accreditation. Celebrated globally for cardiovascular surgery, organ transplants, IVF, and genetics.',
                'gallery' => [
                    ['title' => 'Memorial Sisli Hospital Modern Campus in Istanbul', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Bingur Sonmez',
                        'slug' => 'prof-dr-bingur-sonmez',
                        'designation' => 'Head of Cardiovascular Surgery',
                        'spaciality' => 'Cardiology & Heart Care',
                        'experience' => 37,
                        'OPD_fee' => 2800.00,
                        'surgeries' => '15,000+ Beating-Heart Bypass Surgeries',
                        'image' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MD</strong> - Istanbul University Faculty of Medicine</p><p><strong>Fellowship in Cardiothoracic Surgery</strong> - St. Thomas\' Hospital, London, UK</p>',
                        'awards' => '<p>&bull; International Fellow of Royal College of Surgeons (FRCS)</p>',
                        'work_experiance' => '<p>Chief of Heart Surgery at <strong>Memorial Sisli Hospital</strong></p>',
                    ],
                ],
            ],

            // 9. Bumrungrad International Hospital (Bangkok, Thailand)
            [
                'name' => 'Bumrungrad International Hospital',
                'slug' => 'bumrungrad-international-hospital',
                'contact' => '+66 2 0668888',
                'email' => 'info@bumrungrad.com',
                'country_id' => $geo['thailand']->id,
                'state_id' => $geo['bangkokState']->id,
                'city_id' => $geo['bangkokCity']->id,
                'address' => '33 Sukhumvit 3, Khlong Toei Nuea, Watthana, Bangkok 10110, Thailand',
                'establish_year' => 1980,
                'hospital_category_id' => $cat['quaternary']->id,
                'no_of_bed' => 580,
                'about' => 'Bumrungrad International Hospital is Southeast Asia\'s flagship medical tourism institution, caring for over 1.1 million patients from 190+ countries every year with JCI and Global Healthcare Accreditations.',
                'gallery' => [
                    ['title' => 'Bumrungrad Iconic Glass Facade in Central Bangkok', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'World-Class International Patient Service Lounge', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Mazen Al-Hadidi',
                        'slug' => 'dr-mazen-al-hadidi',
                        'designation' => 'Director - Joint Replacement & Robotic Arthroplasty',
                        'spaciality' => 'Orthopedics & Joint Care',
                        'experience' => 28,
                        'OPD_fee' => 3100.00,
                        'surgeries' => '7,000+ Mako Robotic Joint Replacements',
                        'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MD</strong> - American University of Beirut</p><p><strong>Residency in Orthopedic Surgery</strong> - University of Iowa Hospitals, USA</p><p><strong>Fellowship</strong> - Harvard Medical School / Massachusetts General Hospital, Boston, USA</p>',
                        'awards' => '<p>&bull; American Board of Orthopedic Surgery (ABOS) Certified</p>',
                        'work_experiance' => '<p>Senior Orthopedic Surgeon at <strong>Bumrungrad International Hospital</strong></p>',
                    ],
                ],
            ],
        ];

        // Process each hospital and its child models
        foreach ($hospitalsData as $hData) {
            $doctorsData = $hData['doctors'] ?? [];
            $galleryData = $hData['gallery'] ?? [];
            unset($hData['doctors'], $hData['gallery']);

            // Find existing hospital by slug, name, contact, or email to avoid duplicate key errors
            $existing = Hospital::where('slug', $hData['slug'])
                ->orWhere('name', $hData['name'])
                ->orWhere('contact', $hData['contact'])
                ->orWhere('email', $hData['email'])
                ->first();

            if (!$existing) {
                $hData['code'] = Hospital::generateHospitalCode();
                $hData['password'] = Hash::make('12345678');
                $hData['status'] = true;
                $hospital = Hospital::create($hData);
            } else {
                $existing->update($hData);
                $hospital = $existing;
            }

            // A. Seed Facilities
            foreach ($facilitiesList as $facName) {
                Facility::firstOrCreate([
                    'hospital_id' => $hospital->id,
                    'name' => $facName,
                ]);
            }

            // B. Seed Categorized Services
            foreach ($servicesByCategory as $catName => $serviceItems) {
                foreach ($serviceItems as $item) {
                    Service::firstOrCreate([
                        'hospital_id' => $hospital->id,
                        'category' => $catName,
                        'name' => $item,
                    ]);
                }
            }

            // C. Seed Infrastructure HTML
            Infrustructure::updateOrCreate(
                ['hospital_id' => $hospital->id],
                [
                    'description' => '<p><strong>' . $hospital->name . '</strong> is engineered to world-class quaternary care benchmarks, providing <strong>' . number_format($hospital->no_of_bed) . ' certified inpatient beds</strong>, modern modular surgical suites, positive-pressure laminar airflow operating rooms, and specialized intensive care units.</p><h4>Infrastructure Highlights:</h4><ul><li><strong>Robotic Surgical Suite:</strong> Dual-console da Vinci Xi and Mako platforms for cardiac, orthopedic, and urological precision.</li><li><strong>Critical Care Architecture:</strong> Dedicated Coronary Care Unit (CCU), Medical ICU, Surgical ICU, and Pediatric & Neonatal ICUs with 1:1 nursing ratios.</li><li><strong>24/7 Level-1 Trauma & Emergency:</strong> Round-the-clock emergency triage, on-site digital diagnostics, and air ambulance coordination.</li></ul>',
                ]
            );

            // D. Seed Location Guide HTML
            LocationGuide::updateOrCreate(
                ['hospital_id' => $hospital->id],
                [
                    'description' => '<h3>Airport Connectivity & Neighborhood Guide</h3><p>Situated in a prime medical corridor with seamless transit access for international patients and accompanying family members.</p><h4>Airport & Transit Access:</h4><ul><li><strong>International Airport Transit:</strong> Approximately 15 to 25 km (25-35 minutes express highway commute). Complimentary airport pick-up and tarmac reception available for foreign patients.</li><li><strong>Metro & City Transit:</strong> Within 5 to 10 minutes walking distance from main hospital reception.</li></ul><h4>Patient Accommodation:</h4><ul><li>Over 15 vetted 3-star, 4-star, and 5-star partner hotels located within 1 to 3 km offering special concessional patient recovery rates.</li></ul>',
                ]
            );

            // E. Seed Gallery Images
            foreach ($galleryData as $img) {
                HospitalImage::firstOrCreate([
                    'hospital_id' => $hospital->id,
                    'title' => $img['title'],
                ], [
                    'image' => $img['image'],
                ]);
            }

            // F. Seed Verified Reviews
            $sampleReviews = [
                [
                    'name' => 'Sheikh Fahad Al-Otaibi',
                    'rating' => 5,
                    'review' => 'Exceptional clinical care at ' . $hospital->name . '. From airport reception in an ambulance to bypass surgery and daily rehabilitation, everything was handled with utmost professionalism. The Arabic interpreter stayed with us throughout our stay.',
                    'designation_or_country' => 'Riyadh, Saudi Arabia • International Patient',
                    'status' => true,
                ],
                [
                    'name' => 'Elena Rostova',
                    'rating' => 5,
                    'review' => 'Underwent robotic surgery here. The recovery was remarkably fast and practically painless. World-class technology and very compassionate nursing care. We are deeply grateful to the entire surgical team.',
                    'designation_or_country' => 'Tashkent, Uzbekistan • Verified Patient',
                    'status' => true,
                ],
                [
                    'name' => 'James M. Kariuki',
                    'rating' => 5,
                    'review' => 'Traveled from Nairobi for specialized treatment. The transparency in pricing, speed of diagnostic workups, and medical visa assistance were outstanding. Highly recommended for international medical travel.',
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

            // G. Seed Doctors and Schedules under this Hospital
            foreach ($doctorsData as $dData) {
                $doc = Doctor::where('hospital_id', $hospital->id)
                    ->where('name', $dData['name'])
                    ->first();

                if (!$doc) {
                    $doc = Doctor::where('slug', $dData['slug'])->first();
                }

                if ($doc) {
                    $doc->update(array_merge($dData, ['hospital_id' => $hospital->id, 'status' => true]));
                } else {
                    $doc = Doctor::create(array_merge($dData, ['hospital_id' => $hospital->id, 'status' => true]));
                }

                // Doctor Weekly Schedules
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

            $this->command?->info("  ✓ Seeded Hospital: {$hospital->name} with " . count($doctorsData) . " doctors, schedules, gallery & services.");
        }
    }
}
