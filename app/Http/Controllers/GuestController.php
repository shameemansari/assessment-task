<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Employer;
use App\Models\JobType;
use App\Models\Location;
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

        if($user?->hasRole('seeker'))
        {
            $seekerId = Seeker::select('id')->where('user_id', $user->id)->first()?->id;
            $alreadyApplied = Application::select('job_id')->where('seeker_id', $seekerId)->pluck('job_id')?->toArray();
        }

        if($request->ajax())
        {
            $allJobs = PostedJob::query()->with(['skills','employer','location','jobtype']);

            if(!empty($request->skills)) {
                $skillId = (int) $request->skills;
                $allJobs = $allJobs->whereHas('skills', function($query) use($skillId) {
                    $query->where('skill_id', $skillId);
                });
            }

            if(!empty($request->jobtype)) {
                $jobTypeId = array_filter($request->jobtype);
                $allJobs = $allJobs->whereIn('job_type_id',  $jobTypeId);
            }

            if(!empty($request->location)) {
                $locationId = (int) $request->location;
                $allJobs = $allJobs->where('location_id', $locationId);
            }

            $allJobs = $allJobs->latest()->paginate(10);

            $html = view('components.jobs.job_list', ['jobs' => $allJobs, 'alreadyApplied' => $alreadyApplied])->render();
            return response()->json($html);
        }
 
        return view('front.pages.jobs');
    }

    public function candidateList(Request $request)
    {
        
        if($request->ajax())
        {
            $allSeekers = Seeker::query()->with(['user','skills']);

            if(!empty($request->skills)) {
                $skillId = (int) $request->skills;
                $allSeekers = $allSeekers->whereHas('skills', function($query) use($skillId) {
                    $query->where('skill_id', $skillId);
                });
            }

            if(!empty($request->jobtype)) {
                $jobTypeId = array_filter($request->jobtype);
                $allSeekers = $allSeekers->whereIn('job_type_id',  $jobTypeId);
            }

            if(!empty($request->location)) {
                $locationId = (int) $request->location;
                $allSeekers = $allSeekers->where('location_id', $locationId);
            }

            $allSeekers = $allSeekers->latest()->paginate(10);

            $html = view('components.seekers.seeker_list', ['allSeekers' => $allSeekers])->render();
            return response()->json($html);
        }
 

        return view('front.pages.candidates');
    }

   

}
