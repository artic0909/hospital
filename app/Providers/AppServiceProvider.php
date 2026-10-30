<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\DoctorSpeciality;
use App\Models\HospitalCategory;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();
        $this->composeHeaderNavigation();
    }

    /**
     * Share dynamic navigation data with frontend header.
     */
    protected function composeHeaderNavigation(): void
    {
        View::composer('frontend.includes.header', function ($view) {
            try {
                // Countries that have active hospitals, eager loaded with their hospitals and categories
                $headerCountries = Country::whereHas('hospitals', function ($query) {
                    $query->where('status', true);
                })
                ->with(['hospitals' => function ($query) {
                    $query->where('status', true)->with('category');
                }])
                ->take(6)
                ->get();

                // If fewer than 4 countries have hospitals, complement with additional countries
                if ($headerCountries->count() < 4) {
                    $existingIds = $headerCountries->pluck('id')->toArray();
                    $additionalCountries = Country::whereNotIn('id', $existingIds)
                        ->with(['hospitals' => function ($query) {
                            $query->where('status', true)->with('category');
                        }])
                        ->take(6 - count($existingIds))
                        ->get();
                    $headerCountries = $headerCountries->concat($additionalCountries);
                }

                $allHospitalCategories = HospitalCategory::orderBy('name')->get();

                // Dynamic Header Specialities: Only show specialities that have active doctors in DB
                $activeDoctorSpecialities = \App\Models\Doctor::where('status', true)
                    ->whereNotNull('spaciality')
                    ->where('spaciality', '!=', '')
                    ->select('spaciality', \Illuminate\Support\Facades\DB::raw('count(*) as doc_count'))
                    ->groupBy('spaciality')
                    ->get();

                // Match with registered DoctorSpeciality records, or create on the fly with smart icon & description
                $matchedSpecialities = collect();
                foreach ($activeDoctorSpecialities as $item) {
                    $specName = trim($item->spaciality);
                    $words = array_filter(preg_split('/[\s,&]+/', $specName), fn($w) => mb_strlen($w) > 3);

                    $matched = DoctorSpeciality::withCount('treatments')
                        ->where(function ($q) use ($specName, $words) {
                            $q->where('name', 'like', "%{$specName}%")
                              ->orWhereRaw('? LIKE CONCAT("%", name, "%")', [$specName]);
                            foreach ($words as $w) {
                                $q->orWhere('name', 'like', "%{$w}%");
                            }
                        })
                        ->first();

                    // Smart icon mapping
                    $icon = 'icons/cardio.svg';
                    $lower = strtolower($specName);
                    if (str_contains($lower, 'cardio') || str_contains($lower, 'heart')) {
                        $icon = 'icons/cardio.svg';
                    } elseif (str_contains($lower, 'liver') || str_contains($lower, 'hepato')) {
                        $icon = 'icons/liver.svg';
                    } elseif (str_contains($lower, 'onco') || str_contains($lower, 'cancer')) {
                        $icon = 'icons/onco.svg';
                    } elseif (str_contains($lower, 'ortho') || str_contains($lower, 'joint') || str_contains($lower, 'bone')) {
                        $icon = 'icons/ortho.svg';
                    } elseif (str_contains($lower, 'neuro') || str_contains($lower, 'brain')) {
                        $icon = 'icons/neuro.png';
                    } elseif (str_contains($lower, 'spine')) {
                        $icon = 'icons/spine.svg';
                    } elseif (str_contains($lower, 'kidney') || str_contains($lower, 'nephro') || str_contains($lower, 'renal')) {
                        $icon = 'icons/kidneytransplant.svg';
                    } elseif (str_contains($lower, 'ivf') || str_contains($lower, 'fertil')) {
                        $icon = 'icons/ivf.svg';
                    } elseif (str_contains($lower, 'gyne') || str_contains($lower, 'women')) {
                        $icon = 'icons/heno.svg';
                    } elseif (str_contains($lower, 'plastic') || str_contains($lower, 'cosmet')) {
                        $icon = 'icons/cosmatic.svg';
                    } elseif (str_contains($lower, 'bariatric') || str_contains($lower, 'weight')) {
                        $icon = 'icons/weightloss.svg';
                    }

                    $matchedSpecialities->push((object)[
                        'name' => $specName,
                        'image' => !empty($matched?->image) ? $matched->image : $icon,
                        'description' => $matched?->description ?? 'Specialized clinical consultations & surgical care',
                        'treatments_count' => $matched?->treatments_count ?? 0,
                        'doctors_count' => $item->doc_count,
                    ]);
                }

                $headerSpecialities = $matchedSpecialities->unique('name');

                // If no doctors exist yet in DB, fallback to registered specialities
                if ($headerSpecialities->isEmpty()) {
                    $headerSpecialities = DoctorSpeciality::withCount('treatments')->orderBy('name')->take(12)->get();
                }
            } catch (\Throwable $e) {
                $headerCountries = collect();
                $allHospitalCategories = collect();
                $headerSpecialities = collect();
            }

            $view->with([
                'headerCountries' => $headerCountries,
                'allHospitalCategories' => $allHospitalCategories,
                'headerSpecialities' => $headerSpecialities,
            ]);
        });
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
