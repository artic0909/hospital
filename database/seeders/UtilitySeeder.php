<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\DoctorSpeciality;
use App\Models\HospitalCategory;
use App\Models\State;
use App\Models\Treatment;
use Illuminate\Database\Seeder;

class UtilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Countries
        $india = Country::firstOrCreate(['name' => 'India']);
        $turkey = Country::firstOrCreate(['name' => 'Turkey']);
        $thailand = Country::firstOrCreate(['name' => 'Thailand']);
        $uae = Country::firstOrCreate(['name' => 'United Arab Emirates']);

        // 2. States
        $maharashtra = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Maharashtra']);
        $delhiNcr = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Delhi NCR']);
        $karnataka = State::firstOrCreate(['country_id' => $india->id, 'name' => 'Karnataka']);
        $istanbul = State::firstOrCreate(['country_id' => $turkey->id, 'name' => 'Istanbul']);
        $bangkok = State::firstOrCreate(['country_id' => $thailand->id, 'name' => 'Bangkok']);
        $dubai = State::firstOrCreate(['country_id' => $uae->id, 'name' => 'Dubai']);

        // 3. Cities
        City::firstOrCreate(['state_id' => $maharashtra->id, 'name' => 'Mumbai']);
        City::firstOrCreate(['state_id' => $maharashtra->id, 'name' => 'Navi Mumbai']);
        City::firstOrCreate(['state_id' => $delhiNcr->id, 'name' => 'New Delhi']);
        City::firstOrCreate(['state_id' => $delhiNcr->id, 'name' => 'Gurgaon']);
        City::firstOrCreate(['state_id' => $karnataka->id, 'name' => 'Bangalore']);
        City::firstOrCreate(['state_id' => $istanbul->id, 'name' => 'Istanbul']);
        City::firstOrCreate(['state_id' => $bangkok->id, 'name' => 'Bangkok']);
        City::firstOrCreate(['state_id' => $dubai->id, 'name' => 'Dubai']);

        // 4. Clinical Departments
        $cardio = Department::firstOrCreate(
            ['name' => 'Cardiology & Cardiac Surgery'],
            ['description' => 'Comprehensive cardiac care including CABG, angioplasty, TAVR, and pediatric heart surgery.']
        );
        $onco = Department::firstOrCreate(
            ['name' => 'Oncology & Cancer Care'],
            ['description' => 'Advanced medical, surgical, and radiation oncology with proton therapy and immunotherapy.']
        );
        $ortho = Department::firstOrCreate(
            ['name' => 'Orthopedics & Joint Replacement'],
            ['description' => 'Robotic joint replacement, spine surgery, sports medicine, and arthroscopy.']
        );
        $neuro = Department::firstOrCreate(
            ['name' => 'Neurosurgery & Spine'],
            ['description' => 'Deep brain stimulation, micro-neurosurgery, spine deformity correction, and stroke care.']
        );

        // 5. Doctor Specialities
        $cardioSpec = DoctorSpeciality::updateOrCreate(
            ['id' => 1],
            ['name' => 'Cardiology & Heart Care', 'image' => 'icons/cardio.svg', 'description' => 'Minimally invasive bypass, valve repair, angioplasty & pediatric heart care.']
        );
        $oncoSpec = DoctorSpeciality::updateOrCreate(
            ['id' => 2],
            ['name' => 'Oncology & Cancer Care', 'image' => 'icons/onco.svg', 'description' => 'Targeted immunotherapy, robotic surgical oncology & precision therapies.']
        );
        $orthoSpec = DoctorSpeciality::updateOrCreate(
            ['id' => 3],
            ['name' => 'Orthopedics & Joint Care', 'image' => 'icons/ortho.svg', 'description' => 'Robotic knee & hip replacements, arthroscopy & joint restoration.']
        );
        $neuroSpec = DoctorSpeciality::updateOrCreate(
            ['id' => 4],
            ['name' => 'Neurosurgery & Brain Care', 'image' => 'icons/neuro.png', 'description' => 'Micro-neurosurgical procedures, cranial tumor care & neuro-navigation.']
        );
        DoctorSpeciality::updateOrCreate(
            ['id' => 5],
            ['name' => 'Advanced Spine Surgery', 'image' => 'icons/spine.svg', 'description' => 'Endoscopic disc surgery, spinal deformity correction & motion preservation.']
        );
        DoctorSpeciality::updateOrCreate(
            ['id' => 6],
            ['name' => 'IVF & Reproductive Care', 'image' => 'icons/ivf.svg', 'description' => 'Advanced IVF/ICSI cycles, fertility preservation & high success rates.']
        );
        DoctorSpeciality::updateOrCreate(
            ['id' => 7],
            ['name' => 'Gynecology & Women\'s Health', 'image' => 'icons/heno.svg', 'description' => 'Specialized women\'s health, laparoscopic gynecology & pelvic care.']
        );
        DoctorSpeciality::updateOrCreate(
            ['id' => 8],
            ['name' => 'Cosmetic & Plastic Surgery', 'image' => 'icons/cosmatic.svg', 'description' => 'Aesthetic facial refinement, hair restoration & body sculpting procedures.']
        );
        DoctorSpeciality::updateOrCreate(
            ['id' => 9],
            ['name' => 'Bariatrics & Weight Loss', 'image' => 'icons/weightloss.svg', 'description' => 'Minimally invasive gastric sleeve, bypass & metabolic wellness care.']
        );
        DoctorSpeciality::updateOrCreate(
            ['id' => 10],
            ['name' => 'Liver Transplant & Hepatic Care', 'image' => 'icons/liver.svg', 'description' => 'High-success living donor transplants & complex hepato-biliary care.']
        );
        DoctorSpeciality::updateOrCreate(
            ['id' => 11],
            ['name' => 'Kidney Care & Nephrology', 'image' => 'icons/kidneytransplant.svg', 'description' => 'Advanced renal transplantation, dialysis access & comprehensive renal care.']
        );
        DoctorSpeciality::updateOrCreate(
            ['id' => 12],
            ['name' => 'Bone Marrow & Stem Cell', 'image' => 'icons/bonemarrow.svg', 'description' => 'Autologous & allogeneic stem cell therapies for blood disorders.']
        );

        // 6. Hospital Categories
        HospitalCategory::firstOrCreate(['name' => 'Multi-Specialty Quaternary Hospital']);
        HospitalCategory::firstOrCreate(['name' => 'Super-Specialty Tertiary Hospital']);
        HospitalCategory::firstOrCreate(['name' => 'JCI Accredited Center of Excellence']);
        HospitalCategory::firstOrCreate(['name' => 'NABH Accredited Hospital']);

        // 7. Treatments
        Treatment::firstOrCreate(
            ['name' => 'Coronary Artery Bypass Grafting (CABG)'],
            [
                'department_id' => $cardio->id,
                'spaciality_id' => $cardioSpec->id,
                'price' => 480000.00,
                'price_type' => 'rupees',
            ]
        );

        Treatment::firstOrCreate(
            ['name' => 'Bilateral Robotic Knee Replacement'],
            [
                'department_id' => $ortho->id,
                'spaciality_id' => $orthoSpec->id,
                'price' => 620000.00,
                'price_type' => 'rupees',
            ]
        );

        Treatment::firstOrCreate(
            ['name' => 'Deep Brain Stimulation (DBS)'],
            [
                'department_id' => $neuro->id,
                'spaciality_id' => $neuroSpec->id,
                'price' => 18500.00,
                'price_type' => 'dollars',
            ]
        );

        Treatment::firstOrCreate(
            ['name' => 'Targeted Immunotherapy (Cycle)'],
            [
                'department_id' => $onco->id,
                'spaciality_id' => $oncoSpec->id,
                'price' => 850000.00,
                'price_type' => 'rupees',
            ]
        );
    }
}
