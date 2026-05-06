<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\HirerProfile;
use App\Models\JobPost;
use App\Models\JobApplication;
use App\Models\Skill;

class HirerController extends Controller
{
    function addUpdateDetails(Request $request){
        HirerProfile::updateOrCreate(
            ['user_id' => auth()->id()], 
            [
                'company_name' => $request->company_name,
                'website' => $request->website,
                'company_size' => $request->company_size,
                'industry' => $request->industry,
                'location' => $request->location,
                'company_description' => $request->company_description,
            ]
        );
        return redirect()->back()->with('status', 'Profile saved successfully');
    }

    function getDetails(){
      $details = HirerProfile::where('user_id', auth()->id())->first();
      if($details){
         return view('hirer.hirer-information',['details'=>$details]);
      }
      return view('hirer.hirer-information',['details'=>[]]);;
    }

    function addJobs(Request $request){
            $details = HirerProfile::where('user_id', auth()->id())->first();

            if (!$details) {
                dd("error in loading");
                return redirect()->back()->with('status', 'Complete profile first');
            }

            DB::beginTransaction();

            $job = JobPost::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'job_type' => $request->job_type,
                'description' => $request->description,
                'location' => $request->location,
                'salary_max'=>$request->salary_max,
                'salary_min'=>$request->salary_min
            ]);

            if($request->has('skills')){
                $job->skills()->attach($request->skills);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Job created');
    }

    function getJobsAndSkills(){
        $skills = Skill::all();
        $jobs = JobPost::where('user_id',auth()->id())->get();
        return view('hirer.jobs',['skills'=>$skills,'jobs'=>$jobs]);
    }

    function updateApplicationStatus(Request $request,$userId,$jobId){
        // dd($request->status);
        $job = JobPost::find($jobId);
        $job->applicants()->syncWithoutDetaching([$userId => [
            'status' => $request->status
        ]]);
        return redirect()->back()->with('success','status updated successfully');
    }

    function getJobApplication(){
       $jobPosts = auth()->user()->jobPosts()->with('applicants')->get();
       $applications = [];
        foreach ($jobPosts as $job) {
        foreach ($job->applicants as $user) {
            $applications[] = [
                'user'=>$user,
                'job_id'=>$job->id,
                'job_title'=>$job->title,
                'status' => $user->pivot->status,
                ];
        }
      }
      return view('hirer.applications',['applications'=>$applications]);
    }
}
