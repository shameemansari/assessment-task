<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\PostedJob;
use App\Models\Skill;
use Yajra\DataTables\Facades\DataTables;

class PostedJobController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = auth()->user();
            $allJobs = PostedJob::with(['skills'])->withCount('applicants')->where('employer_id', Employer::select('id')->where('user_id', auth()->user()->id)->first()?->id);
            return DataTables::of($allJobs)
                ->addColumn('skills', function ($row) {
                    $str = '';
                    foreach ($row->skills as $skill) {
                        $str .= $skill->name . ', ';
                    }
                    $str = rtrim($str, ', ');
                    return $str;
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
                ->rawColumns(['action', 'experience', 'description','application_count'])
                ->make(true);
        }

        return view('admin.jobs.index');
    }


    public function postJob(Request $request)
    {
        $allSkills = Skill::pluck('name', 'id');
        return view('admin.jobs.create', compact('allSkills'));
    }

    public function storePostJob(Request $request)
    {
        $postedJobData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'skills' => 'required|array|min:1',
            'years' => 'required|integer|min:0|max:80',
            'months' => 'required|integer|min:0|max:11',
        ], [], [
            'title' => 'Title',
            'description' => 'Description',
            'years' => 'Years',
            'months' => 'Months',
            'skills' => 'Skills',
        ]);

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
        } catch (\Exception $e) {
            return back()->with(['status' => false, 'message' => $e->getMessage()]);
        }
        return to_route('postJob.index')->with(['status' => true, 'message' => 'Job posted successfully']);
    }

    public function editJob(Request $request, $jobId)
    {
        $job = PostedJob::with(['skills', 'user'])->findOrFail($jobId);
        $allSkills = Skill::pluck('name', 'id');
        $selectedSkills = $job?->skills?->pluck('id')?->toArray() ?? [];
        return view('admin.jobs.edit', compact('job', 'allSkills', 'selectedSkills'));
    }

    public function updatePostJob(Request $request, $jobId)
    {
        $job = PostedJob::where('id', $jobId)->first();
        if (!$job) {
            return back()->with(['status' => false, 'message' => "Post job not found"]);
        }

        $postedJobData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'skills' => 'required|array|min:1',
            'years' => 'required|min:0|max:80',
            'months' => 'required|min:0|max:11',
        ], [], [
            'title' => 'Title',
            'description' => 'Description',
            'years' => 'Years',
            'months' => 'Months',
            'skills' => 'Skills',
        ]);

        try {
            $job->update($postedJobData);
            if (!empty($postedJobData['skills'])) {
                $job->skills()->sync($postedJobData['skills']);
            }
        } catch (\Exception $e) {
            return back()->with(['status' => false, 'message' => $e->getMessage()]);
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
