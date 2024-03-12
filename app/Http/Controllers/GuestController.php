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
        $alreadyApplied = [];

        $user = auth()->user();

        $allCategories = Cache::remember('allCategories', 60, function() {
            return Category::latest('id')->pluck('name','id');
        });

        $allSkills = Cache::remember('allSkills', 60, function() {
            return Skill::latest('id')->pluck('name','id');
        });

        $jobTypes = Cache::remember('jobTypes', 60, function() {
            return JobType::latest('id')->pluck('name','id');
        });
       
        if($user?->hasRole('seeker'))
        {
            $seekerId = Seeker::select('id')->where('user_id', $user->id)->first()?->id;
            $alreadyApplied = Application::select('job_id')->where('seeker_id', $seekerId)->pluck('job_id')?->toArray();
        }

        if($request->ajax())
        {

            $allJobs = PostedJob::query()->with(['skills','employer']);

            if(!empty($request->skills)) {
                $searchSkills = array_filter($request->skills);
                // $allJobs = $allJobs->whereHas('skills', function($query){
                //     $query->where('')
                // });
            }
            $allJobs = $allJobs->paginate(10);

            $html = view('components.jobs.job_list', ['jobs' => $allJobs, 'alreadyApplied' => $alreadyApplied])->render();
            return response()->json($html);
        }
 
        return view('front.pages.jobs', compact('allCategories','allSkills','jobTypes'));
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
