<?php

namespace Database\Seeders;

use App\Models\Blog;
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

class ServerMasterDataSeeder extends Seeder
{
    /**
     * Run the comprehensive database seeds for Blogs, Hospitals, and Doctors.
     */
    public function run(): void
    {
        $this->command?->info('=============================================');
        $this->command?->info('Starting Master Server Data Seeder...');
        $this->command?->info('=============================================');

        // Step 1: Seed Blogs
        $this->seedBlogs();

        // Step 2: Seed Geography & Categories
        $geo = $this->seedGeographyAndCategories();

        // Step 3: Seed Hospitals, Doctors & Relational Metadata
        $this->seedHospitalsAndDoctors($geo);

        $this->command?->info('=============================================');
        $this->command?->info('Master Server Data Seeder Completed Successfully!');
        $this->command?->info('=============================================');
    }

    /**
     * 1. Seed Multiple Rich Healthcare Blogs & Guides
     */
    protected function seedBlogs(): void
    {
        $this->command?->info('-> Seeding Healthcare Blogs & News Articles...');

        $blogs = [
            [
                'title' => 'India Emerges as Global Hub for High-Precision Robotic Cardiac Surgeries',
                'slug' => 'india-emerges-global-hub-robotic-cardiac-surgeries',
                'category' => 'Robotic Surgery',
                'author_name' => 'Dr. Sameer Saxena, Chief Medical Editor',
                'publisher_or_source' => 'BioSpectrum International',
                'reading_time' => '5 min read',
                'is_featured' => true,
                'views' => 3840,
                'published_at' => now()->subDays(2),
                'image' => 'https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'Cutting-edge da Vinci robotic systems and beating-heart bypass procedures in India offer 99.4% clinical success at a fraction of Western costs.',
                'content' => '
                    <p class="lead">In recent years, India has emerged as a premier destination for complex cardiovascular interventions. Backed by JCI-accredited tertiary hospitals, fourth-generation da Vinci Xi robotic consoles, and internationally acclaimed cardiothoracic surgeons, patients from over 85 countries are choosing Indian healthcare centers.</p>
                    
                    <h3>Why International Patients Choose India for Heart Surgeries</h3>
                    <p>Conventional open-heart surgery requires a sternotomy, where the breastbone is divided to grant access to the heart. In contrast, robotically assisted minimally invasive cardiac surgery (MICS) requires small keyhole incisions of less than 2 inches between the ribs.</p>
                    <ul>
                        <li><strong>Minimal Blood Loss:</strong> 80% reduction in blood transfusion requirements.</li>
                        <li><strong>Zero Bone Trauma:</strong> Sparing the sternum translates into dramatically reduced post-op pain.</li>
                        <li><strong>Rapid Return to Mobility:</strong> Most international patients are discharged within 4 to 5 days and cleared for international flights in 10 to 14 days.</li>
                        <li><strong>Significant Cost Advantage:</strong> Advanced procedures like Robotic CABG or TAVR cost approximately $7,000 to $9,500 in India, compared to $90,000 to $140,000 in North America or Western Europe.</li>
                    </ul>

                    <h3>Center of Excellence Protocols</h3>
                    <p>Top medical centers in Delhi NCR, Mumbai, and Bangalore have integrated artificial intelligence with 3D hemodynamic modeling. This allows surgical teams to simulate blood flows and bypass graft placements before making the first incision, ensuring predictable, world-class outcomes.</p>
                ',
            ],
            [
                'title' => 'Complete 2026 Guide to Indian Medical e-Visa: Documents, Process & 48-Hour Clearances',
                'slug' => 'complete-guide-indian-medical-e-visa-clearances',
                'category' => 'Medical Tourism & Visa',
                'author_name' => 'HealGoFly Immigration Desk',
                'publisher_or_source' => 'Global Visa Advisory',
                'reading_time' => '4 min read',
                'is_featured' => true,
                'views' => 5120,
                'published_at' => now()->subDays(4),
                'image' => 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'Everything international patients and accompanying family need to know about Indian e-Medical Visas, FRRO registration, and companion attendant permits.',
                'content' => '
                    <p class="lead">Navigating travel documentation during a medical emergency or planned elective procedure should be seamless. The Government of India has streamlined the e-Medical Visa and e-Medical Attendant Visa system for citizens of over 165 countries.</p>
                    
                    <h3>Key Requirements for the e-Medical Visa (e-Med)</h3>
                    <ol>
                        <li><strong>Valid Passport:</strong> Must have at least six months validity from the arrival date and at least two blank pages.</li>
                        <li><strong>Official Hospital Visa Invitation Letter:</strong> Issued on hospital letterhead mentioning the patient’s diagnosis, recommended treatment plan, and passport numbers of the patient and up to two attendants.</li>
                        <li><strong>Recent Medical Dossiers:</strong> Diagnostic scans, local physician referral letters, and relevant lab summaries.</li>
                    </ol>

                    <h3>Attendant Clearances (e-Medical Attendant Visa)</h3>
                    <p>Up to two attendants (spouses, adult children, or designated family caregivers) are permitted per patient. Their visas are co-terminus with the patient’s duration of stay.</p>

                    <h3>How HealGoFly Facilitates Your Journey</h3>
                    <p>Our dedicated visa liaisons coordinate directly with the accredited hospital’s International Patient Desk to generate official visa invitation letters within 12 to 24 hours. We assist you with online filing, fee payments, and FRRO registration upon arrival.</p>
                ',
            ],
            [
                'title' => 'Living Donor Liver Transplants: 98% Success Rates and 3D Hepatic Mapping',
                'slug' => 'living-donor-liver-transplants-hepatic-mapping-success',
                'category' => 'Organ Transplants',
                'author_name' => 'Prof. Dr. Arvinder Singh Soin',
                'publisher_or_source' => 'International Hepatic Journal',
                'reading_time' => '6 min read',
                'is_featured' => false,
                'views' => 2940,
                'published_at' => now()->subDays(6),
                'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'Pioneering surgical innovations in adult and pediatric living donor liver transplants achieve world-record 98.2% 5-year survival rates.',
                'content' => '
                    <p class="lead">Living donor liver transplantation (LDLT) is one of the most demanding surgical feats in modern medicine. Indian transplant centers now perform over 2,500 liver transplants annually, boasting outcomes comparable or superior to leading centers in the US and Europe.</p>
                    
                    <h3>Advancements in Donor Safety</h3>
                    <p>Donor safety remains the cardinal priority. Modern high-resolution CT volumetry and intraoperative fluorescence imaging guarantee that the remaining liver volume in the healthy donor regenerates completely within 6 to 8 weeks.</p>
                    
                    <h3>Breakthroughs in Pediatric Care</h3>
                    <p>Surgeons routinely perform reduced-size and split-liver grafts for infants as small as 4.5 kilograms with biliary atresia or metabolic disorders. Comprehensive isolation ICUs with laminar airflow eliminate hospital-acquired infection risks during early immunosuppression.</p>
                ',
            ],
            [
                'title' => 'Next-Generation Precision Oncology: CAR-T Cell Therapy and Targeted Immunotherapy',
                'slug' => 'precision-oncology-car-t-cell-therapy-immunotherapy',
                'category' => 'Oncology & Cancer Care',
                'author_name' => 'Dr. Vinod Raina, Chief of Oncology',
                'publisher_or_source' => 'Asian Oncology Review',
                'reading_time' => '7 min read',
                'is_featured' => false,
                'views' => 4310,
                'published_at' => now()->subDays(8),
                'image' => 'https://images.unsplash.com/photo-1530497610245-94d3c16cda28?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'How genomic sequencing, CAR-T cell immunotherapy, and proton beam therapy are turning refractory cancers into manageable chronic conditions.',
                'content' => '
                    <p class="lead">The paradigm of cancer treatment has shifted decisively from blanket chemotherapy regimens to molecularly targeted therapies tailored to the exact genomic profile of each tumor.</p>
                    
                    <h3>The Promise of CAR-T Cell Therapy</h3>
                    <p>Chimeric Antigen Receptor T-cell (CAR-T) therapy re-engineers a patient\'s own immune cells to seek out and eradicate cancerous cells. Previously available only in select Western research hospitals at costs exceeding $400,000, indigenous CAR-T innovations in India now offer this curative treatment at a fraction of the cost.</p>
                    
                    <h3>Proton Beam Therapy</h3>
                    <p>Unlike standard X-ray photon radiation which irradiates healthy tissue on both sides of a tumor, protons deposit their maximum radiation dose directly at the tumor site (the Bragg Peak) and stop completely. This makes it the gold standard for pediatric tumors, brain malignancies, and prostate cancers.</p>
                ',
            ],
            [
                'title' => 'Minimally Invasive Spine Surgery (MISS): Rapid Recovery with Endoscopic Decompression',
                'slug' => 'minimally-invasive-spine-surgery-endoscopic-decompression',
                'category' => 'Orthopedics & Spine',
                'author_name' => 'Dr. Vidyadhara S., Spine Consultant',
                'publisher_or_source' => 'The Spine Journal Asia',
                'reading_time' => '4 min read',
                'is_featured' => false,
                'views' => 2180,
                'published_at' => now()->subDays(10),
                'image' => 'https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'Keyhole spinal procedures allow international patients to walk the next morning and fly back home within a week with zero muscle trauma.',
                'content' => '
                    <p class="lead">Chronic back pain, herniated discs, and spinal canal stenosis often prevent patients from leading active lives. Traditional open spine surgery required large incisions and muscle detachment. Today, full endoscopic spinal surgery has revolutionized recovery timelines.</p>
                    
                    <h3>Advantages of Endoscopic Spine Decompression:</h3>
                    <ul>
                        <li>Incisions smaller than 8mm (covered with a simple band-aid).</li>
                        <li>Performed under local or mild sedation, eliminating general anesthesia risks for senior citizens.</li>
                        <li>Patients ambulate within 3 hours post-procedure.</li>
                        <li>High-definition 4K endoscopic cameras ensure nerves are protected with absolute precision.</li>
                    </ul>
                ',
            ],
            [
                'title' => 'Transcatheter Aortic Valve Replacement (TAVR): The Non-Surgical Heart Valve Solution',
                'slug' => 'transcatheter-aortic-valve-replacement-tavr-valve-solution',
                'category' => 'Cardiology',
                'author_name' => 'Dr. Ashok Seth, Interventional Cardiologist',
                'publisher_or_source' => 'Cardiovascular Innovations Daily',
                'reading_time' => '5 min read',
                'is_featured' => false,
                'views' => 2750,
                'published_at' => now()->subDays(12),
                'image' => 'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'A game-changer for high-risk elderly cardiac patients: replacing aortic valves through a needle puncture in the femoral artery.',
                'content' => '
                    <p class="lead">Severe aortic stenosis causes debilitating breathlessness, chest angina, and heart failure. For decades, the only remedy was open-heart surgery. For elderly patients or those with kidney, lung, or prior bypass conditions, open surgery carried elevated risk.</p>
                    
                    <h3>How TAVR Works</h3>
                    <p>Through a tiny needle puncture in the groin, a specialized catheter delivers a collapsible artificial valve directly inside the diseased native valve. Once expanded, the new valve takes over blood circulation immediately. The patient remains awake or lightly sedated and is typically discharged within 48 hours.</p>
                ',
            ],
            [
                'title' => 'Advanced IVF & Reproductive Protocols: PGT-A Genetic Screening for International Couples',
                'slug' => 'advanced-ivf-reproductive-protocols-pgt-a-genetic-screening',
                'category' => 'Reproductive Health',
                'author_name' => 'Dr. Nalini Mahajan, Reproductive Endocrinologist',
                'publisher_or_source' => 'Global Fertility Insights',
                'reading_time' => '5 min read',
                'is_featured' => false,
                'views' => 1930,
                'published_at' => now()->subDays(15),
                'image' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'ICSI, blastocyst vitrification, and Pre-implantation Genetic Testing give renewed hope to couples coping with recurrent pregnancy loss.',
                'content' => '
                    <p class="lead">Infertility affects millions of couples worldwide. International fertility travelers seek treatment in accredited clinics that combine embryology incubation with comprehensive chromosomal screening.</p>
                    
                    <h3>Breakthroughs in IVF Success Rates</h3>
                    <p>By employing Next-Generation Sequencing (NGS) for Pre-implantation Genetic Testing for Aneuploidies (PGT-A), clinical teams can identify genetically balanced embryos before transfer. This boosts implantation success rates to over 72% per transfer cycle while minimizing miscarriage risks.</p>
                ',
            ],
            [
                'title' => 'International Patient Experience: Airport Pick-Up, Multilingual Interpreters & Halal Care',
                'slug' => 'international-patient-experience-airport-multilingual-interpreters',
                'category' => 'Patient Care & Travel',
                'author_name' => 'Sarah Al-Mansoor, Patient Liaison',
                'publisher_or_source' => 'HealGoFly Concierge Desk',
                'reading_time' => '4 min read',
                'is_featured' => false,
                'views' => 3120,
                'published_at' => now()->subDays(18),
                'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'From dedicated tarmac ambulances and Arabic/Russian interpreters to certified halal kitchens, how top hospitals ensure home-like comfort.',
                'content' => '
                    <p class="lead">Undergoing major surgery in a foreign country can feel intimidating. Premier partner hospitals have designed dedicated International Patient Services (IPS) wings to provide total comfort for patients and their families.</p>
                    
                    <h3>Five-Star Medical Travel Amenities</h3>
                    <ul>
                        <li><strong>Complimentary Tarmac & Airport Transfers:</strong> Dedicated vehicles or ambulances meeting flights directly at the terminal.</li>
                        <li><strong>In-House Multilingual Coordinators:</strong> Dedicated interpreters fluent in Arabic, Russian, French, Bengali, and Dari available throughout rounds and consultations.</li>
                        <li><strong>Dietary Customization:</strong> Certified Halal, vegetarian, continental, and clinical renal/diabetic meals prepared by certified culinary dieticians.</li>
                        <li><strong>Extended Family Accommodation:</strong> Partner serviced apartments with full kitchens and laundry within 5 minutes of the hospital.</li>
                    </ul>
                ',
            ],
            [
                'title' => 'Safe Air Travel After Major Surgery: Essential Medical Clearance & Fit-to-Fly Rules',
                'slug' => 'safe-air-travel-after-major-surgery-fit-to-fly-rules',
                'category' => 'Travel Health',
                'author_name' => 'Dr. Vikram Sharma, Aviation Medicine Specialist',
                'publisher_or_source' => 'Aviation Medicine & Travel Health',
                'reading_time' => '4 min read',
                'is_featured' => false,
                'views' => 2050,
                'published_at' => now()->subDays(21),
                'image' => 'https://images.unsplash.com/photo-1520607164069-c5b0ab227b76?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'Critical guidelines on cabin pressurization, DVT prophylaxis, MEDIF clearance, and in-flight oxygen support when flying back home.',
                'content' => '
                    <p class="lead">Returning home after major surgery requires coordinated medical planning. Cabin pressures at cruising altitudes of 35,000 feet correspond to an atmospheric pressure equivalent to 6,000 to 8,000 feet above sea level.</p>
                    
                    <h3>Essential Clearance Milestones</h3>
                    <ol>
                        <li><strong>Minimum Stay Timelines:</strong> Minor laparoscopic procedures generally require 3 to 5 days, while joint replacements, cardiac bypass, or craniotomies mandate 10 to 14 days before flying.</li>
                        <li><strong>DVT Prophylaxis:</strong> Graduated compression stockings, hydration, and prophylactic low-molecular-weight heparin injections.</li>
                        <li><strong>Airline Medical Clearance (MEDIF):</strong> Coordination with airlines if stretcher seating or supplemental in-flight oxygen is required.</li>
                    </ol>
                ',
            ],
        ];

        foreach ($blogs as $blogData) {
            Blog::updateOrCreate(
                ['slug' => $blogData['slug']],
                array_merge($blogData, ['status' => 'published'])
            );
        }

        $this->command?->info('  ✓ Seeded ' . count($blogs) . ' healthcare blogs successfully.');
    }

    /**
     * 2. Seed Geography & Hospital Categories
     */
    protected function seedGeographyAndCategories(): array
    {
        $this->command?->info('-> Seeding Countries, States, Cities, and Categories...');

        // Countries
        $india = Country::firstOrCreate(['name' => 'India']);
        $uae = Country::firstOrCreate(['name' => 'United Arab Emirates']);
        $turkey = Country::firstOrCreate(['name' => 'Turkey']);
        $thailand = Country::firstOrCreate(['name' => 'Thailand']);

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

        // Hospital Categories
        $superSpec = HospitalCategory::firstOrCreate(['name' => 'Super-Specialty Hospital']);
        $multiSpec = HospitalCategory::firstOrCreate(['name' => 'Multi-Specialty Hospital']);
        $jciCenter = HospitalCategory::firstOrCreate(['name' => 'JCI Accredited Center of Excellence']);
        $oncologyInstitute = HospitalCategory::firstOrCreate(['name' => 'Comprehensive Cancer Center']);

        // Doctor Specialities (sync so navigation/search matches doctors)
        $specialitiesList = [
            'Cardiology' => 'Advanced cardiac interventions, angioplasty, TAVR and heart rhythm therapies.',
            'Cardiothoracic Surgery' => 'Minimally invasive bypass, valve replacements, and complex congenital heart surgeries.',
            'Hepatology & Liver Transplant' => 'Adult and pediatric living donor liver transplants and complex liver care.',
            'Oncology & Cancer Care' => 'Comprehensive medical, surgical, and radiation oncology with genomic profiling.',
            'Neurosurgery & Spine' => 'Micro-neurosurgery, brain tumor resections, CyberKnife, and keyhole spine decompression.',
            'Orthopedics & Joint Replacement' => 'Robotic knee and hip arthroplasty, deformity correction, and sports medicine.',
            'Nephrology & Renal Transplant' => 'Advanced kidney transplantation, hemodialysis, and chronic kidney disease management.',
            'Pediatric Cardiac Surgery' => 'Specialized neonatal and pediatric congenital heart reconstructions.',
        ];

        foreach ($specialitiesList as $specName => $specDesc) {
            DoctorSpeciality::firstOrCreate(
                ['name' => $specName],
                [
                    'description' => $specDesc,
                ]
            );
        }

        return [
            'countries' => compact('india', 'uae', 'turkey', 'thailand'),
            'states' => compact('delhiState', 'maharashtraState', 'karnatakaState', 'dubaiState', 'istanbulState', 'bangkokState'),
            'cities' => compact('newDelhi', 'gurgaon', 'mumbai', 'bangalore', 'dubaiCity', 'istanbulCity', 'bangkokCity'),
            'categories' => compact('superSpec', 'multiSpec', 'jciCenter', 'oncologyInstitute'),
        ];
    }

    /**
     * 3. Seed Hospitals, Doctors & Relational Metadata
     */
    protected function seedHospitalsAndDoctors(array $geo): void
    {
        $this->command?->info('-> Seeding Hospitals, Doctors, Facilities, Infrastructure, and Schedules...');

        $c = $geo['countries'];
        $s = $geo['states'];
        $ct = $geo['cities'];
        $cat = $geo['categories'];

        // Standard Facilities
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

        // Standard Categorized Services
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

        // Master Hospital Data Set
        $hospitalsData = [
            // 1. Indraprastha Apollo Hospitals (New Delhi)
            [
                'name' => 'Indraprastha Apollo Hospitals',
                'slug' => 'indraprastha-apollo-hospitals',
                'contact' => '+91 11 26925858',
                'email' => 'assistance@apollohospitals.com',
                'country_id' => $c['india']->id,
                'state_id' => $s['delhiState']->id,
                'city_id' => $ct['newDelhi']->id,
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
                        'spaciality' => 'Cardiology',
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
                        'spaciality' => 'Cardiothoracic Surgery',
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

            // 2. Medanta - The Medicity (Gurgaon)
            [
                'name' => 'Medanta - The Medicity',
                'slug' => 'medanta-the-medicity',
                'contact' => '+91 124 4141414',
                'email' => 'info@medanta.org',
                'country_id' => $c['india']->id,
                'state_id' => $s['delhiState']->id,
                'city_id' => $ct['gurgaon']->id,
                'address' => 'CH Bakhtawar Singh Road, Sector 38, Gurugram, Haryana 122001',
                'establish_year' => 2009,
                'hospital_category_id' => $cat['superSpec']->id,
                'no_of_bed' => 1250,
                'about' => 'Medanta is one of India\'s largest multi-super specialty institutes. Founded by Dr. Naresh Trehan, it houses centers of excellence for Heart, Neurosciences, Bone & Joint, Kidney & Urology, Cancer and Liver Transplantation with JCI and NABH accreditations.',
                'gallery' => [
                    ['title' => 'Medanta Gurugram 43-Acre Campus', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Cardiac Catheterization Laboratories', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Specialized Liver Transplant ICU', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'CyberKnife VSI Radiosurgery Suite', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'International Patient Services Desk', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Presidential Patient Suites', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Naresh Trehan',
                        'slug' => 'dr-naresh-trehan',
                        'designation' => 'Chairman & Chief Cardiac Surgeon',
                        'spaciality' => 'Cardiothoracic Surgery',
                        'experience' => 38,
                        'OPD_fee' => 2500.00,
                        'surgeries' => '48,000+ Open Heart Surgeries',
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
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
                        'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - All India Institute of Medical Sciences (AIIMS), New Delhi (1986)</p><p><strong>MS (Surgery)</strong> - AIIMS, New Delhi (1989)</p><p><strong>FRCS</strong> - Royal College of Surgeons of Edinburgh & Glasgow, UK</p>',
                        'awards' => '<p>&bull; <strong>Padma Shri</strong> by President of India (2010)</p><p>&bull; RD Birla Award for Outstanding Clinician of the Year</p>',
                        'work_experiance' => '<p>Chairman of Liver Transplant at <strong>Medanta - The Medicity</strong></p><p>Former Senior Consultant at <strong>Sir Ganga Ram Hospital</strong>, New Delhi</p><p>Fellow & Faculty at <strong>Addenbrooke\'s Hospital, Cambridge University</strong>, UK</p>',
                    ],
                    [
                        'name' => 'Sandeep Vaishya',
                        'slug' => 'dr-sandeep-vaishya',
                        'designation' => 'Executive Director - Neurosurgery & CyberKnife Centre',
                        'spaciality' => 'Neurosurgery & Spine',
                        'experience' => 28,
                        'OPD_fee' => 2400.00,
                        'surgeries' => '12,000+ Neurosurgeries & CyberKnife',
                        'image' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - GR Medical College, Gwalior</p><p><strong>MS (General Surgery)</strong> - GR Medical College</p><p><strong>M.Ch (Neurosurgery)</strong> - AIIMS, New Delhi</p><p><strong>Herbert Krause Medal</strong> in Neuro-Oncology</p>',
                        'awards' => '<p>&bull; Herbert Krause Medal for Best Paper in Neuro-Oncology</p><p>&bull; Sundt Fellowship at Mayo Clinic, Rochester, USA</p>',
                        'work_experiance' => '<p>Executive Director of Neurosurgery at <strong>Medanta - The Medicity</strong></p><p>Former Additional Professor of Neurosurgery at <strong>AIIMS, New Delhi</strong></p>',
                    ],
                ],
            ],

            // 3. Fortis Memorial Research Institute (Gurgaon)
            [
                'name' => 'Fortis Memorial Research Institute (FMRI)',
                'slug' => 'fortis-memorial-research-institute-gurgaon',
                'contact' => '+91 124 4962200',
                'email' => 'fmri.query@fortishealthcare.com',
                'country_id' => $c['india']->id,
                'state_id' => $s['delhiState']->id,
                'city_id' => $ct['gurgaon']->id,
                'address' => 'Sector 44, Opposite HUDA City Centre Metro, Gurugram, Haryana 122002',
                'establish_year' => 2013,
                'hospital_category_id' => $cat['jciCenter']->id,
                'no_of_bed' => 1000,
                'about' => 'Fortis Memorial Research Institute (FMRI) is a flagship multi-super-specialty quaternary care hospital. Ranked globally among the world\'s most technologically advanced hospitals by Top Master\'s in Healthcare, FMRI features cutting-edge medical programs in Oncology, Bone Marrow Transplant, Orthopedics, Robotic Surgery, and Neurosciences.',
                'gallery' => [
                    ['title' => 'FMRI Architectural Campus & Lobby', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Robotic Joint Arthroplasty Theatre', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Linear Accelerator Radiation Therapy Suite', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Comprehensive Bone Marrow Unit (BMT)', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'VIP Inpatient Recuperation Suite', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Advanced 24/7 Trauma Command Center', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Vinod Raina',
                        'slug' => 'dr-vinod-raina',
                        'designation' => 'Chairman - Medical Oncology, Hematology & Bone Marrow Transplant',
                        'spaciality' => 'Oncology & Cancer Care',
                        'experience' => 36,
                        'OPD_fee' => 2600.00,
                        'surgeries' => '600+ Bone Marrow Transplants',
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - All India Institute of Medical Sciences (AIIMS), New Delhi (1977)</p><p><strong>MD (Internal Medicine)</strong> - AIIMS, New Delhi (1980)</p><p><strong>MRCP & FRCP</strong> - Royal College of Physicians, UK</p>',
                        'awards' => '<p>&bull; Performed India\'s First High-Dose Chemotherapy & Stem Cell Rescue</p><p>&bull; Leading Investigator in over 50 International Cancer Trials</p>',
                        'work_experiance' => '<p>Chairman of Oncology at <strong>Fortis Healthcare</strong></p><p>Former Professor & Head of Medical Oncology at <strong>AIIMS, New Delhi</strong> (over 23 years)</p>',
                    ],
                    [
                        'name' => 'Ashok Rajgopal',
                        'slug' => 'dr-ashok-rajgopal',
                        'designation' => 'Group Chairman - Orthopedics & Chief Robotic Joint Replacement Surgeon',
                        'spaciality' => 'Orthopedics & Joint Replacement',
                        'experience' => 40,
                        'OPD_fee' => 2800.00,
                        'surgeries' => '35,000+ Total Knee Replacements',
                        'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - Armed Forces Medical College (AFMC), Pune (1974)</p><p><strong>MS (Orthopedics)</strong> - AIIMS, New Delhi (1979)</p><p><strong>M.Ch (Orthopedics)</strong> - University of Liverpool, UK</p><p><strong>FRCS</strong> - Royal College of Surgeons, Edinburgh</p>',
                        'awards' => '<p>&bull; <strong>Padma Shri</strong> conferred by the President of India (2014)</p><p>&bull; Knee Surgeon of the Year - International Arthroplasty Congress</p>',
                        'work_experiance' => '<p>Group Chairman of Orthopedics at <strong>Fortis Healthcare</strong></p><p>Member of International Knee Surgery Design Teams</p>',
                    ],
                ],
            ],

            // 4. Max Super Speciality Hospital, Saket (New Delhi)
            [
                'name' => 'Max Super Speciality Hospital, Saket',
                'slug' => 'max-super-speciality-hospital-saket',
                'contact' => '+91 11 26515050',
                'email' => 'internationaldesk@maxhealthcare.com',
                'country_id' => $c['india']->id,
                'state_id' => $s['delhiState']->id,
                'city_id' => $ct['newDelhi']->id,
                'address' => '1, 2, Press Enclave Road, Mandir Marg, Saket, New Delhi, Delhi 110017',
                'establish_year' => 2006,
                'hospital_category_id' => $cat['superSpec']->id,
                'no_of_bed' => 530,
                'about' => 'Max Super Speciality Hospital Saket is an internationally accredited premier medical destination in South Delhi. Renowned for its dedicated Max Cancer Centre, heart institute, minimally invasive surgical procedures, and kidney transplantation units.',
                'gallery' => [
                    ['title' => 'Max Saket Main Complex & Emergency', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'TrueBeam STx Stereotactic Radiotherapy', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'da Vinci Robotic Surgery Theater', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Interventional Cardiology Cath Suite', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'International Patient Service Center', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Executive Inpatient Wing', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Balbir Singh',
                        'slug' => 'dr-balbir-singh',
                        'designation' => 'Chairman - Cardiac Sciences, Cardiology & Chief Electrophysiologist',
                        'spaciality' => 'Cardiology',
                        'experience' => 33,
                        'OPD_fee' => 2500.00,
                        'surgeries' => '15,000+ Complex Angioplasties & EP',
                        'image' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - Maulana Azad Medical College, New Delhi</p><p><strong>MD</strong> - MAMC, New Delhi</p><p><strong>DM (Cardiology)</strong> - AIIMS, New Delhi</p><p><strong>Fellowship</strong> - American College of Cardiology (FACC)</p>',
                        'awards' => '<p>&bull; <strong>Padma Shri</strong> awarded by Government of India</p><p>&bull; Best Cardiologist of India Award</p>',
                        'work_experiance' => '<p>Chairman of Cardiac Sciences at <strong>Max Healthcare</strong></p><p>Former Director of Cardiology at <strong>Medanta</strong></p><p>Professor of Cardiology at <strong>AIIMS, New Delhi</strong></p>',
                    ],
                    [
                        'name' => 'Harit Chaturvedi',
                        'slug' => 'dr-harit-chaturvedi',
                        'designation' => 'Chairman - Max Institute of Cancer Care & Chief Surgical Oncologist',
                        'spaciality' => 'Oncology & Cancer Care',
                        'experience' => 31,
                        'OPD_fee' => 2600.00,
                        'surgeries' => '10,000+ Complex Oncological Surgeries',
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - GSVM Medical College, Kanpur</p><p><strong>MS (General Surgery)</strong> - GSVM Medical College</p><p><strong>M.Ch (Surgical Oncology)</strong> - Dr. MGR Medical University, Cancer Institute, Adyar, Chennai</p>',
                        'awards' => '<p>&bull; Past President of Indian Association of Surgical Oncology (IASO)</p>',
                        'work_experiance' => '<p>Chairman at <strong>Max Institute of Cancer Care</strong></p><p>Former Senior Consultant at <strong>Rajiv Gandhi Cancer Institute</strong> & <strong>Apollo Hospitals</strong></p>',
                    ],
                ],
            ],

            // 5. Kokilaben Dhirubhai Ambani Hospital (Mumbai)
            [
                'name' => 'Kokilaben Dhirubhai Ambani Hospital',
                'slug' => 'kokilaben-dhirubhai-ambani-hospital-mumbai',
                'contact' => '+91 22 42696969',
                'email' => 'queries@kokilabenhospitals.com',
                'country_id' => $c['india']->id,
                'state_id' => $s['maharashtraState']->id,
                'city_id' => $ct['mumbai']->id,
                'address' => 'Rao Saheb, Achutrao Patwardhan Marg, Four Bungalows, Andheri West, Mumbai, Maharashtra 400053',
                'establish_year' => 2009,
                'hospital_category_id' => $cat['superSpec']->id,
                'no_of_bed' => 750,
                'about' => 'Kokilaben Dhirubhai Ambani Hospital is Mumbai\'s premier quaternary healthcare destination, featuring full-time specialist teams, Maharashtra\'s first robotic surgery program, intraoperative MRI suite, and Asia\'s premier pediatric cardiology center.',
                'gallery' => [
                    ['title' => 'Hospital Tower & Andheri West Entrance', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Intraoperative 3T MRI Brain Suite', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Pediatric Cardiac Catheterization Lab', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Critical Care & Neonatal ICU (NICU)', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Concierge International Patient Lounge', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Executive Inpatient Deluxe Suite', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Suresh Rao',
                        'slug' => 'dr-suresh-rao',
                        'designation' => 'Director - Children\'s Heart Centre & Pediatric Cardiac Surgery',
                        'spaciality' => 'Pediatric Cardiac Surgery',
                        'experience' => 30,
                        'OPD_fee' => 2400.00,
                        'surgeries' => '12,000+ Pediatric Heart Surgeries',
                        'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - St. John\'s Medical College, Bangalore</p><p><strong>MS (General Surgery)</strong> & <strong>M.Ch (CTVS)</strong> - AIIMS, New Delhi</p><p><strong>Fellowship in Pediatric Cardiac Surgery</strong> - Royal Children\'s Hospital, Melbourne, Australia</p>',
                        'awards' => '<p>&bull; Best Pediatric Cardiac Surgeon Award - Maharashtra Medical Council</p>',
                        'work_experiance' => '<p>Director at <strong>Kokilaben Dhirubhai Ambani Hospital</strong></p><p>Former Chief at <strong>Fortis Malar Hospital</strong>, Chennai</p>',
                    ],
                    [
                        'name' => 'Mandar Agashe',
                        'slug' => 'dr-mandar-agashe',
                        'designation' => 'Chief Consultant - Pediatric Orthopedics & Complex Deformity Correction',
                        'spaciality' => 'Orthopedics & Joint Replacement',
                        'experience' => 18,
                        'OPD_fee' => 2000.00,
                        'surgeries' => '4,500+ Pediatric Orthopedic Procedures',
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - King Edward Memorial (KEM) Hospital, Mumbai</p><p><strong>MS (Orthopedics)</strong> - KEM Hospital, Mumbai</p><p><strong>Fellowship</strong> - Rady Children\'s Hospital, San Diego, California, USA</p>',
                        'awards' => '<p>&bull; POSI International Traveling Fellowship Award</p>',
                        'work_experiance' => '<p>Chief Consultant at <strong>Kokilaben Hospital</strong></p><p>Consultant at leading pediatric tertiary care hospitals in Mumbai</p>',
                    ],
                ],
            ],

            // 6. Manipal Hospital, Old Airport Road (Bangalore)
            [
                'name' => 'Manipal Hospital, Old Airport Road',
                'slug' => 'manipal-hospital-old-airport-road-bangalore',
                'contact' => '+91 80 25024444',
                'email' => 'info@manipalhospitals.com',
                'country_id' => $c['india']->id,
                'state_id' => $s['karnatakaState']->id,
                'city_id' => $ct['bangalore']->id,
                'address' => '98, HAL Old Airport Rd, Kodihalli, Bengaluru, Karnataka 560017',
                'establish_year' => 1991,
                'hospital_category_id' => $cat['superSpec']->id,
                'no_of_bed' => 600,
                'about' => 'Manipal Hospital on Old Airport Road, Bangalore is a premier multi-specialty healthcare institution. Accredited by JCI and NABH, it leads in Robotic Surgery, Kidney Transplantation, Interventional Cardiology, Spine Surgery, and Molecular Genetics.',
                'gallery' => [
                    ['title' => 'Manipal Bangalore Campus Facade', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Advanced Endoscopic Spine Theater', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Renal Transplant ICU Unit', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Comprehensive PET-CT Scanning Facility', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'International Patient Coordination Hub', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Comfort Inpatient Suite', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'H. Sudarshan Ballal',
                        'slug' => 'dr-h-sudarshan-ballal',
                        'designation' => 'Chairman - Medical Advisory Board & Senior Consultant Nephrologist',
                        'spaciality' => 'Nephrology & Renal Transplant',
                        'experience' => 38,
                        'OPD_fee' => 2500.00,
                        'surgeries' => '4,000+ Kidney Transplants Supervised',
                        'image' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - Kasturba Medical College, Manipal</p><p><strong>MD</strong> - Kasturba Medical College</p><p><strong>Fellowship in Nephrology</strong> - St. Louis University Medical Center, Missouri, USA</p><p><strong>FRCP</strong> - Royal College of Physicians, London</p>',
                        'awards' => '<p>&bull; Rajyotsava State Award conferred by the Government of Karnataka</p><p>&bull; Teacher of Excellence Award</p>',
                        'work_experiance' => '<p>Chairman of Medical Advisory Board at <strong>Manipal Health Enterprises</strong></p><p>Adjunct Professor of Medicine at <strong>Manipal Academy of Higher Education</strong></p>',
                    ],
                    [
                        'name' => 'Vidyadhara S.',
                        'slug' => 'dr-vidyadhara-s',
                        'designation' => 'Head of Department - Spine Care & Chief Spine Surgeon',
                        'spaciality' => 'Neurosurgery & Spine',
                        'experience' => 24,
                        'OPD_fee' => 2200.00,
                        'surgeries' => '8,000+ Minimally Invasive Spine Procedures',
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MBBS</strong> - Mysore Medical College</p><p><strong>MS (Orthopedics)</strong> - AIIMS, New Delhi</p><p><strong>Fellowship in Spine Surgery</strong> - Queen Mary Hospital, Hong Kong & UK</p>',
                        'awards' => '<p>&bull; Scoliosis Research Society (SRS) Global Outreach Award</p><p>&bull; Asia Pacific Orthopedic Association (APOA) Spine Fellow</p>',
                        'work_experiance' => '<p>Head of Spine Care at <strong>Manipal Hospitals</strong></p><p>Visiting Professor to International Spine Centers</p>',
                    ],
                ],
            ],

            // 7. American Hospital Dubai (UAE)
            [
                'name' => 'American Hospital Dubai',
                'slug' => 'american-hospital-dubai',
                'contact' => '+971 4 3775500',
                'email' => 'info@ahdubai.com',
                'country_id' => $c['uae']->id,
                'state_id' => $s['dubaiState']->id,
                'city_id' => $ct['dubaiCity']->id,
                'address' => 'Oud Metha Road, Bur Dubai, Dubai, United Arab Emirates',
                'establish_year' => 1996,
                'hospital_category_id' => $cat['jciCenter']->id,
                'no_of_bed' => 254,
                'about' => 'Premier private hospital in Dubai providing American standards of healthcare, Mayo Clinic Care Network member, serving patients across the Middle East, Africa, and Central Asia.',
                'gallery' => [
                    ['title' => 'American Hospital Dubai Exterior', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'State of the Art Cancer Care Center', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Hybrid Interventional Suite', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'VIP Recuperation Room', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Dedicated International Helpdesk', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Modern Intensive Care Unit', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
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
                        'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MD</strong> - Tripoli University</p><p><strong>Residency in Radiation Oncology</strong> - McGill University, Canada</p><p><strong>Fellowship</strong> - Cross Cancer Institute, Canada</p>',
                        'awards' => '<p>&bull; Excellence in Clinical Leadership - Dubai Health Authority</p>',
                        'work_experiance' => '<p>Chief Medical Officer at <strong>American Hospital Dubai</strong></p><p>Former Staff Radiation Oncologist at <strong>CancerCare Manitoba</strong>, Canada</p>',
                    ],
                    [
                        'name' => 'Firas Raheemah',
                        'slug' => 'dr-firas-raheemah',
                        'designation' => 'Consultant Interventional Cardiologist & Heart Specialist',
                        'spaciality' => 'Cardiology',
                        'experience' => 20,
                        'OPD_fee' => 3000.00,
                        'surgeries' => '6,500+ Percutaneous Interventions',
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MD</strong> - Baghdad University College of Medicine</p><p><strong>FRCP</strong> - Royal College of Physicians, Edinburgh</p><p><strong>Certificate of Completion of Specialist Training (CCST)</strong> - UK</p>',
                        'awards' => '<p>&bull; Fellow of European Society of Cardiology (FESC)</p>',
                        'work_experiance' => '<p>Consultant Cardiologist at <strong>American Hospital Dubai</strong></p><p>Former Consultant at <strong>NHS Trust Hospitals</strong>, United Kingdom</p>',
                    ],
                ],
            ],

            // 8. Memorial Sisli Hospital (Istanbul, Turkey)
            [
                'name' => 'Memorial Sisli Hospital',
                'slug' => 'memorial-sisli-hospital-istanbul',
                'contact' => '+90 212 3146666',
                'email' => 'international@memorial.com.tr',
                'country_id' => $c['turkey']->id,
                'state_id' => $s['istanbulState']->id,
                'city_id' => $ct['istanbulCity']->id,
                'address' => 'Piyalepasa Bulvari, Sisli, Istanbul 34385, Turkey',
                'establish_year' => 2000,
                'hospital_category_id' => $cat['jciCenter']->id,
                'no_of_bed' => 252,
                'about' => 'Memorial Sisli Hospital is Turkey\'s first JCI-accredited healthcare facility. Renowned across Europe, the Middle East, and Eurasia for cardiovascular surgery, organ transplantation, in vitro fertilization (IVF), and genetic diagnostics.',
                'gallery' => [
                    ['title' => 'Memorial Sisli Hospital Istanbul Tower', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Cardiovascular Surgery Modular Suite', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'IVF Embryology & Genetics Lab', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Deluxe Bosporus View Inpatient Room', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Multilingual International Liaison Office', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Intensive Care Unit (ICU)', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Prof. Dr. Bingür Sönmez',
                        'slug' => 'prof-dr-bingur-sonmez',
                        'designation' => 'Head of Cardiovascular Surgery & Beating-Heart Bypass Pioneer',
                        'spaciality' => 'Cardiothoracic Surgery',
                        'experience' => 37,
                        'OPD_fee' => 2800.00,
                        'surgeries' => '15,000+ Beating-Heart Surgeries',
                        'image' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MD</strong> - Istanbul University Faculty of Medicine (1976)</p><p><strong>Cardiovascular Surgery Specialization</strong> - Istanbul University (1983)</p><p><strong>Fellowship</strong> - St. Thomas Hospital, London, UK</p>',
                        'awards' => '<p>&bull; International Pioneer in Off-Pump Coronary Artery Bypass</p>',
                        'work_experiance' => '<p>Head of Cardiovascular Surgery at <strong>Memorial Sisli Hospital</strong></p><p>Former Chief Surgeon at <strong>Florence Nightingale Hospital</strong>, Istanbul</p>',
                    ],
                    [
                        'name' => 'Prof. Dr. Koray Acarlı',
                        'slug' => 'prof-dr-koray-acarli',
                        'designation' => 'Director - Organ Transplantation Center (Liver & Kidney)',
                        'spaciality' => 'Hepatology & Liver Transplant',
                        'experience' => 32,
                        'OPD_fee' => 3000.00,
                        'surgeries' => '2,500+ Successful Organ Transplants',
                        'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MD</strong> - Istanbul University Faculty of Medicine (1981)</p><p><strong>General Surgery Specialization</strong> - Istanbul University</p><p><strong>Fellowship</strong> - Mount Sinai Medical Center, New York, USA</p>',
                        'awards' => '<p>&bull; Pioneer in Living Donor Liver Transplantation in Eurasia</p>',
                        'work_experiance' => '<p>Director of Organ Transplant Center at <strong>Memorial Health Group</strong></p>',
                    ],
                ],
            ],

            // 9. Bumrungrad International Hospital (Bangkok, Thailand)
            [
                'name' => 'Bumrungrad International Hospital',
                'slug' => 'bumrungrad-international-hospital-bangkok',
                'contact' => '+66 2 0668888',
                'email' => 'info@bumrungrad.com',
                'country_id' => $c['thailand']->id,
                'state_id' => $s['bangkokState']->id,
                'city_id' => $ct['bangkokCity']->id,
                'address' => '33 Sukhumvit 3, Khlong Toei Nuea, Watthana, Bangkok 10110, Thailand',
                'establish_year' => 1980,
                'hospital_category_id' => $cat['jciCenter']->id,
                'no_of_bed' => 580,
                'about' => 'Bumrungrad International Hospital is Southeast Asia\'s flagship medical travel destination, accredited by JCI since 2002. Serving over 1.1 million patients annually from over 190 countries, it combines five-star Thai hospitality with American-board-certified specialists.',
                'gallery' => [
                    ['title' => 'Bumrungrad Sukhumvit 3 Complex', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Mako Robotic Knee & Hip Surgery Unit', 'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Horizon Regional Cancer Center', 'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Five-Star Executive Patient Suite', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Dedicated International Airport Liaison Desk', 'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&auto=format&fit=crop&q=80'],
                    ['title' => 'Pediatric & Neonatal Intensive Care', 'image' => 'https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?w=800&auto=format&fit=crop&q=80'],
                ],
                'doctors' => [
                    [
                        'name' => 'Mazen Al-Khatib',
                        'slug' => 'dr-mazen-al-khatib',
                        'designation' => 'Senior Consultant - Orthopedics & Robotic Joint Replacement',
                        'spaciality' => 'Orthopedics & Joint Replacement',
                        'experience' => 26,
                        'OPD_fee' => 3100.00,
                        'surgeries' => '7,000+ Mako Robotic Joint Replacements',
                        'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MD</strong> - American University of Beirut</p><p><strong>Residency in Orthopedic Surgery</strong> - University of Iowa Hospitals, USA</p><p><strong>Fellowship</strong> - Harvard Medical School / Massachusetts General Hospital, Boston, USA</p>',
                        'awards' => '<p>&bull; American Board of Orthopedic Surgery (ABOS) Certified</p>',
                        'work_experiance' => '<p>Senior Orthopedic Surgeon at <strong>Bumrungrad International Hospital</strong></p>',
                    ],
                    [
                        'name' => 'Vithaya Pairojkul',
                        'slug' => 'dr-vithaya-pairojkul',
                        'designation' => 'Chief of Pediatric Cardiology & Interventional Cardiac Care',
                        'spaciality' => 'Pediatric Cardiac Surgery',
                        'experience' => 34,
                        'OPD_fee' => 2900.00,
                        'surgeries' => '8,500+ Pediatric Interventions',
                        'image' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80',
                        'education' => '<p><strong>MD</strong> - Chulalongkorn University, Thailand</p><p><strong>Diplomate</strong> - American Board of Pediatrics</p><p><strong>Fellowship</strong> - Pediatric Cardiology, Children\'s Memorial Hospital, Chicago, USA</p>',
                        'awards' => '<p>&bull; Lifetime Achievement in Southeast Asian Pediatric Cardiology</p>',
                        'work_experiance' => '<p>Director of Pediatric Cardiology at <strong>Bumrungrad International</strong></p>',
                    ],
                ],
            ],
        ];

        // Seed each hospital and its relations
        foreach ($hospitalsData as $hData) {
            $doctorsData = $hData['doctors'] ?? [];
            $galleryData = $hData['gallery'] ?? [];
            unset($hData['doctors'], $hData['gallery']);

            // Find existing by slug, name, contact or email
            $existingHospital = Hospital::where('slug', $hData['slug'])
                ->orWhere('name', $hData['name'])
                ->orWhere('contact', $hData['contact'])
                ->orWhere('email', $hData['email'])
                ->first();

            if (!$existingHospital) {
                $hData['code'] = Hospital::generateHospitalCode();
                $hData['password'] = Hash::make('12345678');
                $hData['status'] = true;
                $hospital = Hospital::create($hData);
            } else {
                $existingHospital->update($hData);
                $hospital = $existingHospital;
            }

            // Seed Facilities
            foreach ($facilitiesList as $facName) {
                Facility::firstOrCreate([
                    'hospital_id' => $hospital->id,
                    'name' => $facName,
                ]);
            }

            // Seed Gallery Images
            foreach ($galleryData as $img) {
                HospitalImage::firstOrCreate([
                    'hospital_id' => $hospital->id,
                    'title' => $img['title'],
                ], [
                    'image' => $img['image'],
                ]);
            }

            // Seed Infrastructure HTML
            Infrustructure::updateOrCreate([
                'hospital_id' => $hospital->id,
            ], [
                'description' => '<p><strong>' . $hospital->name . '</strong> is engineered to world-class quaternary care benchmarks, providing <strong>' . number_format($hospital->no_of_bed) . ' certified inpatient beds</strong>, modern modular surgical suites, positive-pressure laminar airflow operating rooms, and specialized intensive care units.</p><h4>Infrastructure Highlights:</h4><ul><li><strong>Robotic Surgical Suite:</strong> Dual-console da Vinci Xi and Mako platforms for cardiac, orthopedic, and urological precision.</li><li><strong>Critical Care Architecture:</strong> Dedicated Coronary Care Unit (CCU), Medical ICU, Surgical ICU, and Pediatric & Neonatal ICUs with 1:1 nursing ratios.</li><li><strong>24/7 Level-1 Trauma & Emergency:</strong> Round-the-clock emergency triage, on-site digital diagnostics, and air ambulance coordination.</li></ul>',
            ]);

            // Seed Location Guide HTML
            LocationGuide::updateOrCreate([
                'hospital_id' => $hospital->id,
            ], [
                'description' => '<h3>Airport Connectivity & Neighborhood Guide</h3><p>Situated in a prime medical corridor with seamless transit access for international patients and accompanying family members.</p><h4>Airport & Transit Access:</h4><ul><li><strong>International Airport Transit:</strong> Approximately 15 to 25 km (25-35 minutes express highway commute). Complimentary airport pick-up and tarmac reception available for foreign patients.</li><li><strong>Metro & City Transit:</strong> Within 5 to 10 minutes walking distance from main hospital reception.</li></ul><h4>Patient Accommodation:</h4><ul><li>Over 15 vetted 3-star, 4-star, and 5-star partner hotels located within 1 to 3 km offering special concessional patient recovery rates.</li></ul>',
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

            // Seed Verified International Patient Reviews
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

            // Seed Doctors for this Hospital
            foreach ($doctorsData as $dData) {
                $doc = Doctor::updateOrCreate(
                    [
                        'hospital_id' => $hospital->id,
                        'name' => $dData['name'],
                    ],
                    array_merge($dData, ['status' => true])
                );

                // Seed Doctor Weekly Schedules (Mon - Sat)
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

            $this->command?->info("  ✓ Seeded Hospital: {$hospital->name} with " . count($doctorsData) . " doctors, gallery, infrastructure & schedules.");
        }
    }
}
