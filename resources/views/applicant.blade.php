@extends('layout.master')
@section('title', 'Applicant Info')

@section('content')

<div class="toolbar">
    <div>
        <h1><i class="fa-solid fa-users"></i> Applicants</h1>
        <div class="muted">Total: {{ $students->count() }}</div>
    </div>
</div>

{{-- Alerts --}}
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

@if (session('success'))
<div class="alert alert-success">
    <i class="fa-solid fa-circle-check"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

{{-- Add Applicant Form --}}
<div class="section">
    <h2><i class="fa-solid fa-user-plus"></i> Add Applicant</h2>
    <form action="{{ route('insert') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="field">
            <label>Applicant ID</label>
            <input type="text" name="applicant_id" value="{{ old('applicant_id') }}">
        </div>
        <div class="field">
            <label>Full Name</label>
            <input type="text" name="full_name" value="{{ old('full_name') }}">
        </div>
        <div class="field">
            <label>Course</label>
            <input type="text" name="course" value="{{ old('course') }}">
        </div>
        <div class="field">
            <label>GPA</label>
            <input type="text" name="gpa" value="{{ old('gpa') }}">
        </div>
        <div class="field">
            <label>Applicant Photo</label>
            <input type="file" name="profile_image" accept="image/*">
        </div>
        <button type="submit" class="btn"><i class="fa-solid fa-plus"></i> Add Applicant</button>
    </form>
</div>

{{-- Applicants Table --}}
<div class="section">
<h2><i class="fa-solid fa-table-list"></i> Applicant List</h2>
<table>
    <thead>
        <tr>
            <th>Applicant ID</th>
            <th>Full Name</th>
            <th>Course</th>
            <th>GPA</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($students as $student)
        <tr>
            <td>{{ $student->applicant_id }}</td>
            <td>{{ $student->full_name }}</td>
            <td><span class="badge">{{ $student->course }}</span></td>
            <td>{{ $student->gpa }}</td>
            <td>
                @if ($student->profile_image)
                    <img src="{{ asset('storage/' . $student->profile_image) }}" alt="{{ $student->full_name }}" class="photo" />
                @else
                    No photo
                @endif
            </td>
            <td>
                <div class="actions">
                    <a href="{{ route('applicant.edit', $student->id) }}" class="btn btn-secondary"><i class="fa-solid fa-pen"></i> Edit</a>
                    <form action="{{ route('applicant.delete', $student->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary" onclick="return confirm('Delete {{ $student->full_name }}?')"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">No applicants found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>

@endsection