<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Skill;
use App\Models\Seeker;
use App\Models\PostedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        
        if ($request->ajax()) {
            $allJobs = PostedJob::with(['skills'])->where('employer_id', Employer::select('id')->where('user_id', auth()->user()->id)->first()?->id);
            return DataTables::of($allJobs)
                ->addColumn('skills', function($row){
                    $str = '';
                    foreach($row->skills as $skill) {
                        $str .= $skill->name . ', '; 
                    }
                    $str = rtrim($str, ', ');
                    return $str;
                })
                ->editColumn('description', function($row){
                    return str()->words(strip_tags($row->description), 15, ' Read More...');
                })
                ->editColumn('experience', function($row){
                    return $row->years . ' yrs ' . $row->months . ' months';
                })
                ->addColumn('action', function($row){
                    return "<a href='".route('postJob.edit', ['jobId' => $row->id])."' class='btn btn-sm btn-light-info btn-icon' title='Edit details'> <i class='la la-edit'></i> </a>
                    <a href='#' class='btn btn-sm btn-light-danger btn-icon' title='Delete'> <i class='la la-trash'></i> </a>";
                })
                ->rawColumns(['action','experience','description'])
                ->make(true);
        }

        return view('admin.jobs.index');
    }

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
        $allSeekers = Seeker::with(['user'])->paginate(10);
        $skills = Cache::remember('skills', 60, function() {
                return Skill::latest('id')->pluck('name','id');
        });
        return view('front.pages.candidates',compact('allSeekers','skills'));
    }

    public function postJob(Request $request)
    {
        $allSkills = Skill::pluck('name','id');
        return view('admin.jobs.create', compact('allSkills'));
    }

    public function storePostJob(Request $request)
    {
        $postedJobData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'skills' => 'required|array|min:1',
            'years' => 'required|min:0|max:80',
            'months' => 'required|min:0|max:11',
        ],[],[
            'title' => 'Title',
            'description' => 'Description',
            'years' => 'Years',
            'months' => 'Months',
            'skills' => 'Skills',
        ]);

        try {
            $postedJobData['employer_id'] = Employer::select('id')->where('user_id', auth()->user()->id)->first()?->id;
            $postJob = PostedJob::create($postedJobData);
            if(!empty($postedJobData['skills'])) {
                $postJob->skills()->attach($postedJobData['skills']);
            }
        }catch(\Exception $e) {
            return back()->with(['status' => false, 'message' => $e->getMessage()]);
        }
        return to_route('postJob.index')->with(['status' => true, 'message' => 'Job posted successfully']);
    }

    public function editJob(Request $request, $jobId)
    {
      $job = PostedJob::with(['skills','user'])->findOrFail($jobId);
      $allSkills = Skill::pluck('name','id');
      $selectedSkills = $job?->skills?->pluck('id')?->toArray() ?? [];
      return view('admin.jobs.edit',compact('job','allSkills','selectedSkills'));
    }

    public function updatePostJob(Request $request, $jobId)
    {
        $job = PostedJob::where('id', $jobId)->first();
        if(!$job) {
            return back()->with(['status' => false, 'message' => "Post job not found"]);
        }

        $postedJobData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'skills' => 'required|array|min:1',
            'years' => 'required|min:0|max:80',
            'months' => 'required|min:0|max:11',
        ],[],[
            'title' => 'Title',
            'description' => 'Description',
            'years' => 'Years',
            'months' => 'Months',
            'skills' => 'Skills',
        ]);

        try {
            $job->update($postedJobData);
            if(!empty($postedJobData['skills'])) {
                $job->skills()->sync($postedJobData['skills']);
            }
        }catch(\Exception $e) {
            return back()->with(['status' => false, 'message' => $e->getMessage()]);
        }
        return to_route('postJob.index')->with(['status' => true, 'message' => 'Job post updated successfully']);
    }

}
