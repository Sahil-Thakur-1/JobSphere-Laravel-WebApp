<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\JobSeekerProfile;
use App\Models\WorkExperience;
use App\Models\Education;
use App\Models\Skill;

class JobSeekerController extends Controller
{
    function showDetails(){
     $profile = auth()->user()->jobSeekerProfile;
     $experiences = auth()->user()->workExperiences()->latest()->get();
     $educations = auth()->user()->educations()->latest()->get();
     $skills = Skill::all();
     return view('job_seeker.job-seeker-information',[
        'profile'=>$profile,
        'experiences'=>$experiences,
        'educations'=>$educations,
        'skills'=>$skills
        ]);
    }

    function updateDetail(Request $request){
        try{
        $data = $request->validate([
            'headline' => 'nullable|string|max:255',
            'current_location' => 'nullable|string|max:255',
            'experience' => 'nullable|integer|min:0|max:50',
            'expected_salary' => 'nullable|integer|min:0',
            'summary' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $profile = JobSeekerProfile::where('user_id', auth()->id())->first();

        if ($request->hasFile('resume')) {
            if ($profile && $profile->resume_url) {
                $oldPath = str_replace('/storage/', '', $profile->resume_url);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $path = $request->file('resume')->store('resumes', 'public');
            $data['resume_url'] = '/storage/' . $path;

            // dd($data['resume_url']);
        }

        $profile = JobSeekerProfile::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'headline' => $data['headline'] ?? null,
                'current_location' => $data['current_location'] ?? null,
                'experience' => $data['experience'] ?? null,
                'expected_salary' => $data['expected_salary'] ?? null,
                'summary' => $data['summary'] ?? null,
                'resume_url' => $data['resume_url'] ?? ($profile->resume_url ?? null),
            ]
        );

        if ($request->has('skills')) {
            $profile->user->skills()->sync($request->skills);
        }

        return back()->with('success', 'Profile updated successfully!');
        }
        catch(Exception $e){
            dd($e);
        }
    }

    function addExperience(Request $request){
        $request->validate([
           'company_name'=> ['required'],
           'job_role'=>['required'],
           'start_date'=>['required'],
        ]);

        WorkExperience::create([
           'user_id'=>auth()->id(),
           'company_name'=>$request->company_name,
           'job_role'=>$request->job_role,
           'start_date'=>$request->start_date,
           'end_date'=>$request->end_date,
           'description'=>$request->description,
        ]);

        return redirect()->back();
    }

    function addEducation(Request $request){
        $data = $request->validate([
            'degree' => ['required', 'string', 'max:255'],
            'institution_name' => ['required', 'string', 'max:255'],
            'field_of_study' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'description' => ['nullable', 'string'],
        ]);

        Education::create([
            'user_id' => auth()->id(),
            'degree' => $data['degree'],
            'institution_name' => $data['institution_name'],
            'field_of_study' => $data['field_of_study'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'] ?? null,
            'percentage' => $data['percentage'] ?? null,
            'description' => $data['description'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Education added successfully!');
    }
 
    function deleteEducation($id){
        $education = Education::findOrFail($id);
        if ($education->user_id !== auth()->id()) {
            abort(403);
        }
        $education->delete();
        return redirect()->back()->with('success', 'Education deleted successfully');
    }

    function deleteExperience($id){
        $workExperience = WorkExperience::findOrFail($id);
        if ($workExperience->user_id !== auth()->id()) {
            abort(403);
        }
        $workExperience->delete();
        return redirect()->back()->with('success', 'workExperience deleted successfully');
    }

    function applyJob($id){
        auth()->user()->appliedJobs()->syncWithoutDetaching([$id]);
        return redirect()->back()->with('success','job applied successfully');
    }

    function showJobs(){
        $jobs = JobPost::latest()->paginate(3);
        return view('job_seeker.jobs',['jobs'=>$jobs]);
    }

    function getAppliedJobs(){
        $appliedJobs = auth()->user()
            ->appliedJobs()
            ->with('user.hirerProfile')
            ->latest('job_applications.created_at')
            ->get();
        return view('job_seeker.applied', ['appliedJobs'=>$appliedJobs]);
    }
}
