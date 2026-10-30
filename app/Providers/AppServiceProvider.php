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
                $headerSpecialities = DoctorSpeciality::withCount('treatments')->orderBy('name')->get();
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
