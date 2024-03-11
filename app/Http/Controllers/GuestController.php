<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GuestController extends Controller
{
    public function jobList(Request $request)
    {
        // $allCategories = Cache::remember('allCategories', 60, function() {
        //     return Category::latest('id')->pluck('name','id');
        // });

        // $jobTypes = Cache::remember('jobTypes', 60, function() {
        //     return JobType::latest('id')->pluck('name','id');
        // });

        // $allLocations = State::with(['cities:id,name,state_id'])->lazy();
        // return view('listing.job_list', compact('allCategories','allLocations','jobTypes'));
        return view('front.pages.jobs');
    }

    public function candidateList(Request $request)
    {
        $seekers = ['some','random','a','a'];
        $skills = Cache::remember('skills', 60, function() {
                return Skill::latest('id')->pluck('name','id');
        });
        return view('front.pages.candidates',compact('seekers','skills'));
    }
}
