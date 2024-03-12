<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Employer;
use App\Models\JobType;
use App\Models\PostedJob;
use App\Models\Skill;
use App\Models\Seeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GuestController extends Controller
{
   
    public function jobList(Request $request)
    {
        $allCategories = Cache::remember('allCategories', 60, function() {
            return Category::latest('id')->pluck('name','id');
        });

        $jobTypes = Cache::remember('jobTypes', 60, function() {
            return JobType::latest('id')->pluck('name','id');
        });
        $allJobs = PostedJob::with(['skills','employer'])->paginate(10);

        $user = auth()->user();
        $alreadyApplied = [];
        if($user?->hasRole('seeker'))
        {
            $seekerId = Seeker::select('id')->where('user_id', $user->id)->first()?->id;
            $alreadyApplied = Application::select('job_id')->where('seeker_id', $seekerId)->pluck('job_id')?->toArray();
        }

        // $allLocations = State::with(['cities:id,name,state_id'])->lazy();
        // return view('listing.job_list', compact('allCategories','allLocations','jobTypes'));
        return view('front.pages.jobs', compact('allJobs','alreadyApplied'));
    }

    public function candidateList(Request $request)
    {
        $allSeekers = Seeker::with(['user'])->paginate(10);
        $skills = Cache::remember('skills', 60, function() {
            return Skill::latest('id')->pluck('name','id');
        });
        return view('front.pages.candidates',compact('allSeekers','skills'));
    }

   

}
