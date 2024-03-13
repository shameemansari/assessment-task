<?php

namespace App\Providers;

use App\Models\JobType;
use App\Models\Location;
use App\Models\Skill;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();
        
        View::composer([
            'front.pages.jobs',
            'front.pages.candidates',
            'admin.jobs.create',
            'admin.jobs.edit',
        ], function($view) {
            $allSkills = Cache::remember('allSkills', 60, function() {
                return Skill::latest('id')->pluck('name','id');
            });
    
            $allLocations = Cache::remember('allLocations', 60, function() {
                return Location::latest('id')->pluck('name','id');
            });
    
            $jobTypes = Cache::remember('jobTypes', 60, function() {
                return JobType::latest('id')->pluck('name','id');
            });

            $view->with(compact('allSkills','jobTypes','allLocations'));
        });
    }
}
