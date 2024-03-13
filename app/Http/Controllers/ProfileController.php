<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Employer;
use App\Models\JobType;
use App\Models\Location;
use App\Models\Seeker;
use App\Models\Skill;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    use UploadTrait;

    public function index(Request $request)
    {
        $user = auth()->user();
        $userData = $allSkills = [];

        if ($user->hasRole('employer')) {
            $employer = Employer::where('user_id', $user->id)->first();
            $userData['company'] = $employer->company;
        }

        if ($user->hasRole('seeker')) {
            $seeker = Seeker::with(['skills'])->where('user_id', $user->id)->first();
            $userData['title'] = $seeker->title;
            $userData['experience'] = $seeker->experience;
            $userData['resume'] = $seeker->resume;
            $userData['location_id'] = $seeker->location_id;
            $userData['job_type_id'] = $seeker->job_type_id;
            $userData['allLocations'] = Cache::remember('allLocations', 60, function () {
                return Location::latest('id')->pluck('name', 'id');
            });
            $userData['jobTypes'] =  Cache::remember('jobTypes', 60, function() {
                return JobType::latest('id')->pluck('name','id');
            });
       
            $allSkills = Cache::remember('allSkills', 60, function() {
                return Skill::latest('id')->pluck('name','id');
            });

            $userData['skills'] = $seeker->skills->pluck('id')?->toArray();
        }

        return view('admin.pages.profile', compact('user', 'userData', 'allSkills'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();
        $profileData = $request->validated();

        DB::beginTransaction();
        
        try {

            $user->update([
                'first_name' => $profileData['first_name'],
                'last_name' => $profileData['last_name'],
                'username' => $profileData['username'],
                'email' => $profileData['email'],
            ]);

            if ($profileData['role'] == 'employer') {
                $employer = Employer::where('user_id', $user->id)->first();
                $employer->update(['company' => $profileData['company']]);
            }

            if ($profileData['role'] == 'seeker') {
              
                $seeker = Seeker::where('user_id', $user->id)->first();
                $seekerUpdateData = [
                    'experience' => $profileData['experience'],
                    'title' => $profileData['title'],
                    'skills' => $profileData['skills'],
                    'location_id' => $profileData['location_id'],
                    'job_type_id' => $profileData['job_type_id'],
                ];

                if(!empty($request->resume)) {
                    if (Storage::disk('public')->exists('resume/'. $seeker->resume)) {
                        Storage::disk('public')->delete('resume/'. $seeker->resume);
                    }
                    $seekerUpdateData['resume'] = $this->uploadFile($request->resume, 'resume', $user->fullName());
                }
                $seeker->update($seekerUpdateData);
                if (!empty($profileData['skills'])) {
                    $seeker->skills()->sync($profileData['skills']);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['message' => 'Failed to update profile. ' . $e->getMessage()]);
        }
        return back()->with(['status' => true, 'message' => 'Profile updated successfully']);
    }

    public function resumeDelete(Request $request)
    {
        $user = auth()->user();
        $seeker = Seeker::where('user_id', $user->id)->first();
        if(!empty($seeker->resume)) {
            if (Storage::disk('public')->exists('resume/'. $seeker->resume)) {
                Storage::disk('public')->delete('resume/'. $seeker->resume);
            }
            $seeker->update(['resume' => null]);
        }
        return response()->json(['status' => true, 'message' => 'Resume deleted successfully']);
    }
}
