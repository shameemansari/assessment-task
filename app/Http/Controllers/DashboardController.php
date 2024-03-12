<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Employer;
use App\Models\PostedJob;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $stats = [];
        $user = auth()->user();
        if($user?->hasRole('employer')) {
            $employerId = Employer::select('id')->where('user_id', $user?->id)->first()?->id;
            $stats['jobs_created'] = PostedJob::where('employer_id', $employerId)->count();
            $stats['jobs_applied'] = Application::where('employer_id', $employerId)->count();
        }
        
        return view('admin.pages.dashboard', compact('stats'));
    }
}
