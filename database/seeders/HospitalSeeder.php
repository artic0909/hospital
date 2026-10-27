<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Hospital;
use App\Models\HospitalCategory;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $india = Country::firstOrCreate(['name' => 'India']);
        $uae = Country::firstOrCreate(['name' => 'United Arab Emirates']);

        $delhi = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Delhi NCR']);
        $maharashtra = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Maharashtra']);
        $karnataka = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Karnataka']);
        $dubaiState = State::firstOrCreate(['country_id' => $uae->id, 'name' => 'Dubai']);

        $gurgaon = City::firstOrCreate(['state_id' => $delhi->id, 'name' => 'Gurgaon']);
        $newDelhi = City::firstOrCreate(['state_id' => $delhi->id, 'name' => 'New Delhi']);
        $mumbai = City::firstOrCreate(['state_id' => $maharashtra->id, 'name' => 'Mumbai']);
        $bangalore = City::firstOrCreate(['state_id' => $karnataka->id, 'name' => 'Bangalore']);
        $dubaiCity = City::firstOrCreate(['state_id' => $dubaiState->id, 'name' => 'Dubai']);

        $superSpeciality = HospitalCategory::firstOrCreate(['name' => 'Super-Specialty Hospital']);
        $multiSpeciality = HospitalCategory::firstOrCreate(['name' => 'Multi-Specialty Hospital']);

        $hospitals = [
            [
                'name' => 'Medanta - The Medicity',
                'contact' => '+91 124 4141414',
                'email' => 'info@medanta.org',
                'country_id' => $india->id,
                'state_id' => $delhi->id,
                'city_id' => $gurgaon->id,
                'address' => 'CH Bakhtawar Singh Road, Sector 38, Gurugram, Haryana 122001',
                'establish_year' => 2009,
                'hospital_category_id' => $superSpeciality->id,
                'no_of_bed' => 1250,
                'about' => 'Medanta is one of India\'s largest multi-super specialty institutes. Founded by Dr. Naresh Trehan, it houses centers of excellence for Heart, Neurosciences, Bone & Joint, Kidney & Urology, Cancer and Liver Transplantation with JCI and NABH accreditations.',
                'password' => Hash::make('12345678'),
                'status' => true,
            ],
            [
                'name' => 'Indraprastha Apollo Hospitals',
                'contact' => '+91 11 26925858',
                'email' => 'assistance@apollohospitals.com',
                'country_id' => $india->id,
                'state_id' => $delhi->id,
                'city_id' => $newDelhi->id,
                'address' => 'Sarita Vihar, Delhi Mathura Road, New Delhi, Delhi 110076',
                'establish_year' => 1996,
                'hospital_category_id' => $superSpeciality->id,
                'no_of_bed' => 710,
                'about' => 'First hospital in India to be internationally accredited by JCI consecutively for 5 times. Leader in organ transplants, robotic cardiac surgery, oncology, and robotic neuro-navigation.',
                'password' => Hash::make('12345678'),
                'status' => true,
            ],
            [
                'name' => 'Fortis Memorial Research Institute (FMRI)',
                'contact' => '+91 124 4962200',
                'email' => 'fmri@fortishealthcare.com',
                'country_id' => $india->id,
                'state_id' => $delhi->id,
                'city_id' => $gurgaon->id,
                'address' => 'Sector 44, Opposite HUDA City Centre Metro Station, Gurugram, Haryana 122002',
                'establish_year' => 2013,
                'hospital_category_id' => $superSpeciality->id,
                'no_of_bed' => 1000,
                'about' => 'Known as the "Next Generation Hospital", FMRI is a quaternary care hospital with internationally renowned faculty, state-of-the-art diagnostic and clinical technology including 3T digital MRI and Da Vinci surgical robot.',
                'password' => Hash::make('12345678'),
                'status' => true,
            ],
            [
                'name' => 'Kokilaben Dhirubhai Ambani Hospital',
                'contact' => '+91 22 42696969',
                'email' => 'info@kokilabenhospital.com',
                'country_id' => $india->id,
                'state_id' => $maharashtra->id,
                'city_id' => $mumbai->id,
                'address' => 'Rao Saheb, Achutrao Patwardhan Marg, Four Bungalows, Andheri West, Mumbai 400053',
                'establish_year' => 2009,
                'hospital_category_id' => $multiSpeciality->id,
                'no_of_bed' => 750,
                'about' => 'A premier healthcare destination in Mumbai with the only full-time specialist system in India ensuring prompt and dedicated patient care across 15 flagship centers of excellence.',
                'password' => Hash::make('12345678'),
                'status' => true,
            ],
            [
                'name' => 'Manipal Hospital Bengaluru',
                'contact' => '+91 80 25024444',
                'email' => 'info@manipalhospitals.com',
                'country_id' => $india->id,
                'state_id' => $karnataka->id,
                'city_id' => $bangalore->id,
                'address' => '98, HAL Old Airport Rd, Kodihalli, Bengaluru, Karnataka 560017',
                'establish_year' => 1991,
                'hospital_category_id' => $superSpeciality->id,
                'no_of_bed' => 600,
                'about' => 'Renowned for clinical expertise in oncology, cardiology, organ transplant, and orthopedics with over three decades of trusted medical tourism service.',
                'password' => Hash::make('12345678'),
                'status' => true,
            ],
            [
                'name' => 'American Hospital Dubai',
                'contact' => '+971 4 3775500',
                'email' => 'info@ahdubai.com',
                'country_id' => $uae->id,
                'state_id' => $dubaiState->id,
                'city_id' => $dubaiCity->id,
                'address' => 'Oud Metha Road, Bur Dubai, Dubai, United Arab Emirates',
                'establish_year' => 1996,
                'hospital_category_id' => $superSpeciality->id,
                'no_of_bed' => 254,
                'about' => 'Premier private hospital in Dubai providing American standards of healthcare, Mayo Clinic Care Network member, serving patients across the Middle East, Africa, and Central Asia.',
                'password' => Hash::make('12345678'),
                'status' => true,
            ],
        ];

        foreach ($hospitals as $data) {
            if (empty($data['code'])) {
                $data['code'] = Hospital::generateHospitalCode();
            }
            Hospital::firstOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}
