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
        $this->composeSiteSettings();
        $this->composeHeaderNavigation();
    }

    /**
     * Share dynamic SiteSetting with all views.
     */
    protected function composeSiteSettings(): void
    {
        View::composer('*', function ($view) {
            try {
                if (!isset($view->siteSettings)) {
                    $view->with('siteSettings', \App\Models\SiteSetting::getSettings());
                }
            } catch (\Throwable $e) {
                // Ignore during early bootstrap or migrations
            }
        });
    }

    /**
     * Share dynamic navigation data with frontend header.
     */
    protected function composeHeaderNavigation(): void
    {
        View::composer('frontend.includes.header', function ($view) {
            try {
                // Countries enabled for header navigation that have active hospitals
                $headerCountries = Country::where('show_in_header', true)
                    ->whereHas('hospitals', function ($query) {
                        $query->where('status', true);
                    })
                    ->with(['hospitals' => function ($query) {
                        $query->where('status', true)->with('category');
                    }])
                    ->orderBy('name')
                    ->get();

                $allHospitalCategories = HospitalCategory::orderBy('name')->get();

                // Dynamic Header Specialities: Ordered strictly by admin-defined 'position' (1, 2, 3...)
                $specialitiesList = DoctorSpeciality::withCount('treatments')
                    ->orderBy('position', 'asc')
                    ->orderBy('id', 'asc')
                    ->take(12)
                    ->get();

                // Map active doctor counts to each speciality
                $activeDoctors = \App\Models\Doctor::where('status', true)
                    ->whereNotNull('spaciality')
                    ->where('spaciality', '!=', '')
                    ->select('spaciality', \Illuminate\Support\Facades\DB::raw('count(*) as doc_count'))
                    ->groupBy('spaciality')
                    ->pluck('doc_count', 'spaciality');

                $headerSpecialities = $specialitiesList->map(function ($spec) use ($activeDoctors) {
                    $docCount = 0;
                    foreach ($activeDoctors as $docSpec => $count) {
                        if (stripos($docSpec, $spec->name) !== false || stripos($spec->name, $docSpec) !== false) {
                            $docCount += $count;
                        }
                    }
                    $spec->doctors_count = $docCount;
                    return $spec;
                });
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
