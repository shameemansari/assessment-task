<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Seeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ReturnTypeWillChange;
use Yajra\DataTables\Facades\DataTables;

class ApplicationController extends Controller
{
    public function applyJob(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'job_id' => 'required|exists:posted_jobs,id',
            'employer_id'=> 'required|exists:employers,id',
            'headline' => 'required|string',
            'cover_letter' => 'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => false, 'errors' => $validator->messages()]);
        }
        $user = auth()->user();
        
        $applicantData = $validator->validated();
        $applicantData['user_id'] = $user?->id;
        $applicantData['seeker_id'] = Seeker::select('id')->where('user_id', $user?->id)->first()->id;
        try {
            $alreadyApplied = Application::where([
                'seeker_id' => $applicantData['seeker_id'],
                'job_id' => $applicantData['job_id'],
                // 'employer_id' => $applicantData['employer_id'],
            ])->exists();
            if($alreadyApplied) {
                return response()->json(['status' => false, 'message' => 'Candidate has already applied for this job']);
            }
            $applicant = Application::create($applicantData);        
        }
        catch (\Exception $e)
        {
            return response()->json(['status' => false, 'message' => 'Failed to apply. '. $e->getMessage()]);
        }
        return response()->json(['status' => true, 'message' => 'Applied for Job successfully']);
    }

    public function appliedJobs(Request $request)
    {
        $user = auth()->user();
        if ($request->ajax()) {
            $user = auth()->user();
            $seekerId = Seeker::select('id')->where('user_id', $user->id)->first()?->id;
            $allApplied = Application::with(['job.skills'])->where('seeker_id', $seekerId);
            return DataTables::of($allApplied)
                ->addColumn('skills', function ($row) {
                    $str = '';
                    foreach ($row->job->skills as $skill) {
                        $str .= $skill->name . ', ';
                    }
                    $str = rtrim($str, ', ');
                    return $str;
                })
                ->addColumn('title', function ($row) {
                    return $row->job?->title;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at?->format('jS F Y');
                })
                ->addColumn('description', function ($row) {
                    return str()->words(strip_tags($row->job?->description), 15, ' Read More...');
                })
                ->addColumn('experience', function ($row) {
                    return $row->job?->years . ' yrs ' . $row->job?->months . ' months';
                })
                ->rawColumns(['experience', 'description','created_at','skills','title'])
                ->make(true);
        }
        return view('admin.pages.applied_jobs');
    }
}
