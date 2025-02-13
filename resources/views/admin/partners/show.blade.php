@extends('admin.layouts.master')
@section('title', "{$partnerDetail->company_name} | Youth Globe")

@section('main-content')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-md-3">
            <div class="card mb-4 shadow">
                <div class="card-header bg-gradient-info text-white">
                    <h5 class="mb-0">General Information</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name: </strong>{{ $partnerDetail->company_name }}</li>
                        <li class="list-group-item"><strong>Email: </strong>{{ $partnerDetail->partner->email }}</li>
                        <li class="list-group-item"><strong>Joined: </strong>{{ $partnerDetail->created_at->format('d M, Y') }}</li>
                        <li class="list-group-item">
                            <strong>Status: </strong>
                            <span class="badge {{ $partnerDetail->partner->status === 'active' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($partnerDetail->partner->status) }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header bg-gradient-info text-white">
                    <h5 class="mb-0">Navigation</h5>
                </div>
                <div class="card-body">
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs" id="partnerTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                type="button" role="tab" aria-controls="details" aria-selected="true">Partner Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="programs-tab" data-bs-toggle="tab" data-bs-target="#programs"
                                type="button" role="tab" aria-controls="programs" aria-selected="false">Programs</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="students-tab" data-bs-toggle="tab" data-bs-target="#students"
                                type="button" role="tab" aria-controls="students" aria-selected="false">Applications</button>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tab-content mt-3" id="partnerTabsContent">
                        <!-- Partner Details Tab -->
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Username: </strong>{{ $partnerDetail->partner->username }}</li>
                                <li class="list-group-item"><strong>Company name: </strong>{{ $partnerDetail->company_name }}</li>
                                <li class="list-group-item"><strong>Email: </strong>{{ $partnerDetail->partner->email }}</li>
                                <li class="list-group-item"><strong>Additional email: </strong>{{ $partnerDetail->additional_email }}</li>
                                <li class="list-group-item"><strong>Address: </strong>{{ $partnerDetail->address }}</li>
                                <li class="list-group-item"><strong>Phone number: </strong>{{ $partnerDetail->phone_number }}</li>
                                <li class="list-group-item"><strong>Serving area: </strong>{{ ucfirst($partnerDetail->type) }}</li>
                                <li class="list-group-item"><strong>About company: </strong>{{ $partnerDetail->description }}</li>
                                <li class="list-group-item"><strong>Year of Establishment: </strong>{{ $partnerDetail->year_of_establishment }}</li>
                                <li class="list-group-item"><strong>Website link: </strong>{{ $partnerDetail->website_link }}</li>
                                <li class="list-group-item">
                                    <strong>Certificate/License File: </strong>
                                    @if ($partnerDetail->cert_license_file)
                                        <a href="{{ asset('storage/' . $partnerDetail->cert_license_file) }}" class="text-info" target="_blank">Download Certificate</a>
                                    @else
                                        <span class="text-muted">No file uploaded</span>
                                    @endif
                                </li>
                                <li class="list-group-item"><strong>Rating: </strong>
                                    <span class="badge bg-warning">{{ $partnerDetail->rating ?? 'N/A' }}</span>
                                </li>
                            </ul>
                            <div class="mt-3">
                                @if ($partnerDetail->partner->status === 'pending')
                                    <form action="{{ route('partners.approve', $partnerDetail->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success me-2">
                                            <i class="fas fa-check"></i> Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('partners.reject', $partnerDetail->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-times"></i> Reject
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <!-- Programs Tab -->
                        <div class="tab-pane fade" id="programs" role="tabpanel" aria-labelledby="programs-tab">
                            <ul class="list-group">
                                <li class="list-group-item">Program 1: Internship in the USA</li>
                                <li class="list-group-item">Program 2: Work & Travel in Europe</li>
                                <li class="list-group-item">Program 3: Volunteer Program in Asia</li>
                            </ul>
                        </div>

                        <!-- Applications Tab -->
                        <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
                            <p class="fs-5">Total Applications: <strong>120 students</strong></p>
                            <ul class="list-group">
                                <li class="list-group-item">Student 1: John Doe</li>
                                <li class="list-group-item">Student 2: Jane Smith</li>
                                <li class="list-group-item">Student 3: Alice Johnson</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
