@extends('layouts.master')

@section('title', 'Youth Globe - ')

@section('main-content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid my-5">
        <div class="row">
            @include('partner.layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-gradient-info text-white">
                        <h5>Application Details</h5>
                    </div>
                    <div class="card-body">
                        <h5>Applicant Information</h5>
<p><strong>Name:</strong> {{ $application->user->name }}</p>
<p><strong>Email:</strong> {{ $application->user->email }}</p>
<p><strong>Phone:</strong> {{ $application->user->phone ?? 'N/A' }}</p>

<h5 class="mt-4">Applicant Documents</h5>
<div class="row">
    <!-- Left Column -->
    <div class="col-md-6">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Place of Study:</strong>
                {{ $application->user->userDetails->place_of_study ?? 'Not Provided' }}</li>
            <li class="list-group-item"><strong>Confirmation letter:</strong>
                @if (!empty($application->user->userDetails) && $application->user->userDetails->confirmation_letter)
                    <a href="{{ asset('storage/' . $application->user->userDetails->confirmation_letter) }}" target="_blank">
                        View confirmation letter
                    </a>
                @else
                    Not Provided
                @endif
            </li>
            <li class="list-group-item"><strong>Academic transcript:</strong>
                @if (!empty($application->user->userDetails) && $application->user->userDetails->academic_transcript)
                    <a href="{{ asset('storage/' . $application->user->userDetails->academic_transcript) }}" target="_blank">
                        View academic transcript
                    </a>
                @else
                    Not Provided
                @endif
            </li>
        </ul>
    </div>
    <!-- Right Column -->
    <div class="col-md-6">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Motivation letter (essay):</strong>
                @if (!empty($application->user->userDetails) && $application->user->userDetails->motivation_letter)
                    <a href="{{ asset('storage/' . $application->user->userDetails->motivation_letter) }}" target="_blank">
                        View motivation letter
                    </a>
                @else
                    Not Provided
                @endif
            </li>
            <li class="list-group-item"><strong>Resume:</strong>
                @if (!empty($application->user->userDetails) && $application->user->userDetails->resume)
                    <a href="{{ asset('storage/' . $application->user->userDetails->resume) }}" target="_blank">
                        View resume
                    </a>
                @else
                    Not Provided
                @endif
            </li>
            <li class="list-group-item"><strong>Cover letter:</strong>
                @if (!empty($application->user->userDetails) && $application->user->userDetails->cover_letter)
                    <a href="{{ asset('storage/' . $application->user->userDetails->cover_letter) }}" target="_blank">
                        View cover letter
                    </a>
                @else
                    Not Provided
                @endif
            </li>
        </ul>
    </div>
</div>

                        <h5>Program Details</h5>
                        <p><strong>Program Name:</strong> {{ $application->program->title }}</p>
                        <p><strong>Country:</strong> {{ $application->program->country }}</p>
                        <p><strong>Deadline:</strong>
                            {{ \Carbon\Carbon::parse($application->program->deadline)->format('d M, Y') }}
                        </p>

                        <h5>Application Details</h5>
                        <p><strong>Status:</strong>
                            <span
                                class="badge 
                            @if ($application->status == 'approved') bg-success 
                            @elseif($application->status == 'rejected') bg-danger 
                            @else bg-warning @endif">
                                {{ ucfirst($application->status) }}
                            </span>
                        </p>
                        <p><strong>Description:</strong> {{ $application->description ?? 'No description provided' }}</p>
                        <p><strong>Submitted On:</strong> {{ $application->created_at->format('d M Y, h:i A') }}</p>

                        <hr>

                        <h5>Update Application</h5>
                        <form action="{{ route('partner.applications.update', $application->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="status" class="form-label">Update Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>
                                        Approved
                                    </option>
                                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>
                                        Rejected
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Update Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3">{{ $application->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Save Changes</button>
                            <a href="{{ route('partner.applications.index') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
