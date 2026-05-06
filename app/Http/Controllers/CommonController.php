<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\JobApplication;

class CommonController extends Controller
{
    function getJobDetails($id){
        $jobPost = JobPost::with(['user.hirerProfile','skills'])->findOrFail($id);
        return view('common.job-details',['jobPost'=>$jobPost]);
    }

    function showDashboard(){
        if (auth()->user()->role == "hirer") {
            $jobPosts = JobPost::where('user_id', auth()->id())
                ->with('applicants')
                ->get();

            $applications = 0;
            $newApplicants = 0;
            $interviewed = 0;
            $accepted = 0;

            foreach ($jobPosts as $job) {
                foreach ($job->applicants as $applicant) {
                    $applications++;
                    if ($applicant->pivot->status == "interviwed") {
                        $interviewed++;
                    }
                    if ($applicant->pivot->status == "accepted") {
                        $accepted++;
                    }
                    if ($applicant->pivot->created_at >= now()->startOfWeek()) {
                        $newApplicants++;
                    }
                }
            }

            return view('hirer.hirer-dashboard', [
                'totalJobs' => $jobPosts->count(),
                'activeJobs' => $jobPosts->where('status', 'active')->count(),
                'totalApplicants' => $applications,
                'newApplicants' => $newApplicants,
                'interviewed' => $interviewed,
                'accepted' => $accepted,
            ]);

            } else {
                $appliedJobs = JobApplication::where('user_id',auth()->id())->get();
                // dd($appliedJobs);
                return view('job_seeker.job-seeker-dashboard', ['appliedJobs'=>$appliedJobs]);
            }
    }
}
