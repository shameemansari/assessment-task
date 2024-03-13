<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostJobCreateRequest;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\PostedJob;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PostedJobController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = auth()->user();
            $allJobs = PostedJob::with(['skills','location','jobtype'])->withCount('applicants')->where('employer_id', Employer::select('id')->where('user_id', auth()->user()->id)->first()?->id);
            return DataTables::of($allJobs)
                ->addColumn('skills', function ($row) {
                    $str = '';
                    foreach ($row->skills as $skill) {
                        $str .= $skill->name . ', ';
                    }
                    $str = rtrim($str, ', ');
                    return $str;
                })
                ->editColumn('location_id', function ($row) {
                    return $row->location?->name ?? '-';
                })
                ->addColumn('application_count', function ($row) {
                    return $row->applicants_count;
                })
                ->editColumn('description', function ($row) {
                    return str()->words(strip_tags($row->description), 15, ' Read More...');
                })
                ->editColumn('experience', function ($row) {
                    return $row->years . ' yrs ' . $row->months . ' months';
                })
                ->addColumn('action', function ($row) {
                    return "<a href='" . route('postJob.edit', ['jobId' => $row->id]) . "' class='btn btn-sm btn-light-info btn-icon' title='Edit details'> <i class='la la-edit'></i> </a>
                    <button data-url='" . route('postJob.delete', ['jobId' => $row->id]) . "' class='deleteBtn btn btn-sm btn-light-danger btn-icon' title='Delete'> <i class='la la-trash'></i> </button>";
                })
                ->rawColumns(['action', 'experience', 'description','application_count','location_id'])
                ->make(true);
        }

        return view('admin.jobs.index');
    }


    public function postJob(Request $request)
    {
        return view('admin.jobs.create');
    }

    public function storePostJob(PostJobCreateRequest $request)
    {
        $postedJobData = $request->validated();
         
        DB::beginTransaction();
        try {
            $employerId = Employer::select('id')->where('user_id', auth()->user()->id)->first()?->id;
            if(empty($employerId)) {
                return back()->with(['status' => false, 'message' => 'Employer entry not found.']);
            }
            $postedJobData['employer_id'] = $employerId;
            $postJob = PostedJob::create($postedJobData);
            if (!empty($postedJobData['skills'])) {
                $postJob->skills()->attach($postedJobData['skills']);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['status' => false, 'message' => $e->getMessage()]);
        }
        return to_route('postJob.index')->with(['status' => true, 'message' => 'Job posted successfully']);
    }

    public function editJob(Request $request, $jobId)
    {
        $job = PostedJob::with(['skills', 'employer','location','jobtype'])->findOrFail($jobId);
        $selectedSkills = $job?->skills?->pluck('id')?->toArray() ?? [];
        return view('admin.jobs.edit', compact('job', 'selectedSkills'));
    }

    public function updatePostJob(PostJobCreateRequest $request, $jobId)
    {
        $job = PostedJob::where('id', $jobId)->first();
        if (!$job) {
            return back()->with(['status' => false, 'message' => "Post job not found"]);
        }

        $postedJobData = $request->validated();
        DB::beginTransaction();
        try {
            $job->update($postedJobData);
            if (!empty($postedJobData['skills'])) {
                $job->skills()->sync($postedJobData['skills']);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['message' => $e->getMessage()]);
        }
        return to_route('postJob.index')->with(['status' => true, 'message' => 'Job post updated successfully']);
    }

    public function deletePost(Request $request, $jobId)
    {
        $job = PostedJob::where('id', $jobId)->first();
        if (!$job) {
            return response()->json(['status' => false, 'message' => "Post job not found"]);
        }

        if (!$job->delete()) {
            return response()->json(['status' => false, 'message' => 'Failed to delete job post']);
        }
        return response()->json(['status' => true, 'message' => 'Job post deleted successfully']);
    }
}
