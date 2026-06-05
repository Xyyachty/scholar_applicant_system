<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicantController extends Controller
{
    public function index()
    {
        $students = Applicant::all();
        return view('applicant', compact('students'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'applicant_id' => 'required|string|max:50',
            'full_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'gpa' => 'required|numeric',
            'profile_image' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('applicants', 'public');
            $data['profile_image'] = $path;
        }

        Applicant::create($data);

        return redirect()->back()->with('success', 'Record Added Successfully');
    }

    public function edit($id)
    {
        $student = Applicant::findOrFail($id);
        return view('applicant_edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Applicant::findOrFail($id);

        $data = $request->validate([
            'applicant_id' => 'required|string|max:50',
            'full_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'gpa' => 'required|numeric',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            // delete old image
            if ($student->profile_image) {
                Storage::disk('public')->delete($student->profile_image);
            }
            $path = $request->file('profile_image')->store('applicants', 'public');
            $data['profile_image'] = $path;
        }

        $student->update($data);

        return redirect()->route('applicant.index')->with('success', 'Record Updated Successfully');
    }

    public function destroy($id)
    {
        $student = Applicant::findOrFail($id);
        if ($student->profile_image) {
            Storage::disk('public')->delete($student->profile_image);
        }
        $student->delete();
        return redirect()->back()->with('success', 'Record Deleted Successfully');
    }
}
