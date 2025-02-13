@extends('layouts.master')

@section('title', 'Complete Your Details')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Complete Your Details</h2>
    <form method="POST" action="{{ route('user_details.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="passport_copy" class="form-label">Passport Copy</label>
            <input type="file" name="passport_copy" id="passport_copy" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="place_of_study" class="form-label">Place of Study</label>
            <input type="text" name="place_of_study" id="place_of_study" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="confirmation_letter" class="form-label">Confirmation Letter</label>
            <input type="file" name="confirmation_letter" id="confirmation_letter" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="academic_transcript" class="form-label">Academic Transcript</label>
            <input type="file" name="academic_transcript" id="academic_transcript" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="motivation_letter" class="form-label">Motivation Letter</label>
            <input type="file" name="motivation_letter" id="motivation_letter" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Resume</label>
            <input type="file" name="resume" id="resume" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cover_letter" class="form-label">Cover Letter (Optional)</label>
            <input type="file" name="cover_letter" id="cover_letter" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
