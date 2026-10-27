<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medanta = Hospital::where('name', 'like', '%Medanta%')->first() ?? Hospital::first();
        $apollo = Hospital::where('name', 'like', '%Apollo%')->first() ?? Hospital::skip(1)->first();

        if ($medanta) {
            // Doctor 1
            $doc1 = Doctor::updateOrCreate(
                [
                    'hospital_id' => $medanta->id,
                    'name' => 'Naresh Trehan',
                ],
                [
                    'designation' => 'Chairman & Chief Cardiac Surgeon',
                    'slug' => 'naresh-trehan',
                    'spaciality' => 'Cardiothoracic Surgery',
                    'experience' => 38,
                    'OPD_fee' => 2500.00,
                    'surgeries' => '48,000+ Open Heart Surgeries',
                    'education' => '<p><strong>MBBS</strong> - King George\'s Medical University, Lucknow (1968)</p><p><strong>Diplomate</strong> - American Board of Surgery, USA (1977)</p><p><strong>Diplomate</strong> - American Board of Cardiothoracic Surgery, USA (1979)</p>',
                    'awards' => '<p>&bull; <strong>Padma Bhushan</strong> awarded by the Government of India (2001)</p><p>&bull; <strong>Padma Shri</strong> awarded by the Government of India (1991)</p><p>&bull; Dr. B.C. Roy National Award</p>',
                    'work_experiance' => '<p>Founder & Chairman at <strong>Medanta - The Medicity</strong> (2009 - Present)</p><p>Former Executive Director & Founder at <strong>Escorts Heart Institute & Research Centre</strong> (1988 - 2007)</p><p>Assistant Professor of Surgery at <strong>New York University Medical Center</strong>, Manhattan, USA (1981 - 1988)</p>',
                    'image' => null,
                    'status' => true,
                ]
            );

            $this->seedSchedules($doc1->id, [
                ['day' => 'Monday', 'time_from' => '10:00 AM', 'time_to' => '02:00 PM'],
                ['day' => 'Wednesday', 'time_from' => '10:00 AM', 'time_to' => '02:00 PM'],
                ['day' => 'Friday', 'time_from' => '10:00 AM', 'time_to' => '02:00 PM'],
            ]);

            // Doctor 2
            $doc2 = Doctor::updateOrCreate(
                [
                    'hospital_id' => $medanta->id,
                    'name' => 'Arvinder Singh Soin',
                ],
                [
                    'designation' => 'Chairman - Liver Transplantation & Hepatobiliary Sciences',
                    'slug' => 'arvinder-singh-soin',
                    'spaciality' => 'Hepatology & Liver Transplant',
                    'experience' => 32,
                    'OPD_fee' => 2800.00,
                    'surgeries' => '3,500+ Liver Transplants',
                    'education' => '<p><strong>MBBS</strong> - All India Institute of Medical Sciences (AIIMS), New Delhi (1986)</p><p><strong>MS (Surgery)</strong> - AIIMS, New Delhi (1989)</p><p><strong>FRCS</strong> - Royal College of Surgeons of Edinburgh & Glasgow, UK</p>',
                    'awards' => '<p>&bull; <strong>Padma Shri</strong> by the President of India (2010)</p><p>&bull; RD Birla Award for Outstanding Clinician of the Year</p>',
                    'work_experiance' => '<p>Chairman of Liver Transplant at <strong>Medanta - The Medicity</strong></p><p>Former Senior Consultant at <strong>Sir Ganga Ram Hospital</strong>, New Delhi</p><p>Fellow & Faculty at <strong>Addenbrooke\'s Hospital, Cambridge University</strong>, UK</p>',
                    'image' => null,
                    'status' => true,
                ]
            );

            $this->seedSchedules($doc2->id, [
                ['day' => 'Tuesday', 'time_from' => '09:00 AM', 'time_to' => '01:00 PM'],
                ['day' => 'Thursday', 'time_from' => '09:00 AM', 'time_to' => '01:00 PM'],
                ['day' => 'Saturday', 'time_from' => '10:00 AM', 'time_to' => '01:30 PM'],
            ]);
        }

        if ($apollo) {
            // Doctor 3
            $doc3 = Doctor::updateOrCreate(
                [
                    'hospital_id' => $apollo->id,
                    'name' => 'Ashok Seth',
                ],
                [
                    'designation' => 'Chairman - Cardiology & Chief Interventional Cardiologist',
                    'slug' => 'ashok-seth',
                    'spaciality' => 'Interventional Cardiology',
                    'experience' => 35,
                    'OPD_fee' => 2200.00,
                    'surgeries' => '20,000+ Angioplasties',
                    'education' => '<p><strong>MBBS</strong> - JN Medical College, AMU, Aligarh (1979)</p><p><strong>MD</strong> - AMU, Aligarh (1982)</p><p><strong>FRCP</strong> - London, Edinburgh, Glasgow</p><p><strong>FACC, FSCAI, FESC</strong> - USA and Europe</p>',
                    'awards' => '<p>&bull; <strong>Padma Bhushan</strong> (2015)</p><p>&bull; <strong>Padma Shri</strong> (2003)</p><p>&bull; Lifetime Achievement Award in Interventional Cardiology</p>',
                    'work_experiance' => '<p>Chairman of Cardiology at <strong>Fortis / Apollo Healthcare</strong></p><p>Consultant Cardiologist at <strong>Queen Elizabeth Hospital, Birmingham</strong>, UK</p>',
                    'image' => null,
                    'status' => true,
                ]
            );

            $this->seedSchedules($doc3->id, [
                ['day' => 'Monday', 'time_from' => '09:30 AM', 'time_to' => '01:00 PM'],
                ['day' => 'Tuesday', 'time_from' => '09:30 AM', 'time_to' => '01:00 PM'],
                ['day' => 'Thursday', 'time_from' => '02:00 PM', 'time_to' => '05:30 PM'],
                ['day' => 'Friday', 'time_from' => '09:30 AM', 'time_to' => '01:00 PM'],
            ]);
        }
    }

    private function seedSchedules(int $doctorId, array $slots): void
    {
        Schedule::where('doctor_id', $doctorId)->delete();
        foreach ($slots as $slot) {
            Schedule::create([
                'doctor_id' => $doctorId,
                'day' => $slot['day'],
                'time_from' => $slot['time_from'],
                'time_to' => $slot['time_to'],
            ]);
        }
    }
}
