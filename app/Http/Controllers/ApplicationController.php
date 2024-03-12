<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Seeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ReturnTypeWillChange;

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
}
