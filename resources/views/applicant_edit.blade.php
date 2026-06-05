@extends('layout.master')
@section('title', 'Edit Applicant')

@section('content')

<h1><i class="fa-solid fa-user-pen"></i> Edit Applicant</h1>

@if ($errors->any())
<div class="alert alert-error">
    <i class="fa-solid fa-circle-exclamation"></i>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="section">
    <form action="{{ route('applicant.update', $student->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="field">
            <label>Applicant ID</label>
            <input type="text" name="applicant_id" value="{{ old('applicant_id', $student->applicant_id) }}">
        </div>
        <div class="field">
            <label>Full Name</label>
            <input type="text" name="full_name" value="{{ old('full_name', $student->full_name) }}">
        </div>
        <div class="field">
            <label>Course</label>
            <input type="text" name="course" value="{{ old('course', $student->course) }}">
        </div>
        <div class="field">
            <label>GPA</label>
            <input type="text" name="gpa" value="{{ old('gpa', $student->gpa) }}">
        </div>
        <div class="field">
            <label>Applicant Photo</label>
            <input type="file" name="profile_image" accept="image/*">
            @if ($student->profile_image)
                <div><img src="{{ asset('storage/' . $student->profile_image) }}" alt="photo" class="photo"/></div>
            @endif
        </div>
        <button type="submit" class="btn"><i class="fa-solid fa-save"></i> Update</button>
        <a href="{{ route('applicant.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Cancel</a>
    </form>
</div>

@endsection
