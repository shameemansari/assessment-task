<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\JobType;
use App\Models\Location;
use App\Models\Seeker;
use App\Models\Skill;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
            $userData['allLocations'] =  $allLocations = Cache::remember('allLocations', 60, function () {
                return Location::latest('id')->pluck('name', 'id');
            });
            $userData['jobTypes'] =  Cache::remember('jobTypes', 60, function() {
                return JobType::latest('id')->pluck('name','id');
            });
            $allSkills = Skill::pluck('name', 'id');
            $userData['skills'] = $seeker->skills->pluck('id')?->toArray();
        }

        return view('admin.pages.profile', compact('user', 'userData', 'allSkills'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $validationRules = [
            'role' => 'required|in:employer,seeker',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'company' => 'required_if:role,employer|string|max:255',
            'experience' => 'required_if:role,seeker|numeric|min:0|max:80',
            'title' => 'required_if:role,seeker|string|max:255',
            'skills' => 'required_if:role,seeker|array|min:1',
            'resume' => 'nullable|mimes:pdf|max:5012',
            'location_id' => 'required_if:role,seeker|exists:locations,id',
            'job_type_id' => 'required_if:role,seeker|exists:job_types,id',
        ];
        $profileData = $request->validate($validationRules, [], [
            'role' => 'Role',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'email' => 'Email',
            'company' => 'Company Name',
            'experience' => 'Experience',
            'title' => 'Title',
            'skills' => 'Skills',
            'resume' => 'Resume',
            'location_id' => 'Location',
            'job_type_id' => 'Job Type',
        ]);

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
        } catch (\Exception $e) {
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
