@extends('layouts.master')

@section('title', 'Youth Globe - Partner Page')

@section('main-content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <header class="bg-gradient-info text-white text-center pt-3 pb-1">
        <div class="container">
            <h1 class="display-4 text-white">Partner Dashboard</h1>
            <p class="lead">All you can do page.</p>
        </div>
    </header>
    <div class="container-fluid my-5">
        <div class="row">
            @include('partner.layouts.sidebar')
            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Tabs for Partner Details, Programs, Applications -->
                <ul class="nav nav-pills mb-3" id="partnerTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="partnerDetailsTab" data-bs-toggle="pill" href="#partnerDetails"
                            role="tab" aria-controls="partnerDetails" aria-selected="true">Partner Details</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="programsTab" data-bs-toggle="pill" href="#programsSection" role="tab"
                            aria-controls="programsSection" aria-selected="false">Programs</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="applicationsTab" data-bs-toggle="pill" href="#applicationsSection"
                            role="tab" aria-controls="applicationsSection" aria-selected="false">Applications</a>
                    </li>
                </ul>

                <div class="tab-content" id="partnerTabContent">
                    <!-- Partner Details Section -->
                    <div class="tab-pane fade show active" id="partnerDetails" role="tabpanel"
                        aria-labelledby="partnerDetailsTab">
                        <div class="card mb-5">
                            <div class="card-header bg-gradient-info">
                                <h5 class="mb-0 text-white">Partner Details</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Partner Type:</strong>
                                        {{ ucfirst($partnerDetails->type) }}</li>
                                    <li class="list-group-item"><strong>Year of Establishment:</strong>
                                        {{ $partnerDetails->year_of_establishment }}</li>
                                    <li class="list-group-item"><strong>Description:</strong>
                                        {{ $partnerDetails->description }}</li>
                                    <li class="list-group-item"><strong>Certificate/License File:</strong>
                                        @if ($partnerDetails->cert_license_file)
                                            <a href="{{ asset('storage/' . $partnerDetails->cert_license_file) }} "
                                                class="btn btn-link" target="_blank">Download Certificate</a>
                                        @else
                                            <span class="text-muted">No file uploaded</span>
                                        @endif
                                    </li>
                                </ul>
                                <!-- Button to trigger the modal -->
                                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                    data-bs-target="#partnerDetailsModal">
                                    Edit Details
                                </button>
                                @include('modals.partnerdetail')
                            </div>
                        </div>
                    </div>

                    <!-- Programs Section -->
                    @include('partner.programs.list')
                    <!-- Programs Section -->

                    <!-- Applications Section -->
                    <div class="tab-pane fade" id="applicationsSection" role="tabpanel" aria-labelledby="applicationsTab">
                        <div class="card mb-5">
                            <div class="card-header bg-gradient-info">
                                <h5 class="mb-0 text-white">Applications to Your Programs</h5>
                            </div>
                            <div class="card-body">
                                @if ($applications->isEmpty())
                                    <p>No applications have been submitted to your programs yet.</p>
                                @else
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Applicant Name</th>
                                                    <th>Program Name</th>
                                                    <th>Status</th>
                                                    <th>Description</th>
                                                    <th>Submitted On</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($applications as $application)
                                                    <tr>
                                                        <td>{{ $application->user->name }}</td> <!-- Applicant Name -->
                                                        <td>{{ $application->program->title }}</td> <!-- Program Name -->
                                                        <td>
                                                            <span class="badge 
                                                                {{ $application->status == 'approved' ? 'bg-success' : 
                                                                   ($application->status == 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                                                {{ ucfirst($application->status) }}
                                                            </span>
                                                        </td>
                                                        
                                                        <td>{{ $application->description ?? 'No description' }}</td>
                                                        <!-- Description -->
                                                        <td>{{ $application->created_at->format('d M Y, h:i A') }}</td>
                                                        <!-- Submission Date -->
                                                        <td>
                                                            <a href="{{ route('partner.applications.show', ['id' => $application->id]) }}"
                                                                class="btn btn-info btn-sm">View</a>
                                                             
                                                            <a href="#"
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
