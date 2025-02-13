@extends('layouts.master')
@section('title', Auth::user()->name . ' | Youth Globe')
@section('main-content')
    <header class="bg-gradient-info text-white text-center pt-3 pb-1">
        <div class="container">
            <h1 class="display-4 text-white">User Dashboard</h1>
            <p class="lead">View and manage your applications.</p>
        </div>
    </header>

    <section>
        <div class="container py-4">
            <div class="row">
                @include('frontend.layouts.sidebar')

                <div class="col-md-9">
                    <!-- Tabs for Personal Details, Application List -->
                    <ul class="nav nav-pills mb-3" id="userDashboardTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="personalDetailsTab" data-bs-toggle="pill" href="#personalDetails"
                                role="tab" aria-controls="personalDetails" aria-selected="true">Account details</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="applicationListTab" data-bs-toggle="pill" href="#applicationList"
                                role="tab" aria-controls="applicationList" aria-selected="false">Application List</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="userDashboardTabContent">
                        <!-- Personal Details Section -->
                        <div class="tab-pane fade show active" id="personalDetails" role="tabpanel"
                            aria-labelledby="personalDetailsTab">
                            <div class="card mb-5">
                                <div class="card-header bg-gradient-info">
                                    <h5 class="mb-0 text-white">Additional details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><strong>Place of Study:</strong>
                                                    {{ $userDetails->place_of_study ?? 'Not Provided' }}</li>
                                                <li class="list-group-item"><strong>Confirmation letter:</strong>
                                                    @if ($userDetails->confirmation_letter)
                                                        <a href="{{ asset('storage/' . $userDetails->confirmation_letter) }}"
                                                            target="_blank">View confirmation letter</a>
                                                    @else
                                                        Not Provided
                                                    @endif
                                                </li>
                                                <li class="list-group-item"><strong>Academic transcript:</strong>
                                                    @if ($userDetails->academic_transcript)
                                                        <a href="{{ asset('storage/' . $userDetails->academic_transcript) }}"
                                                            target="_blank">View academic transcript</a>
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
                                                    @if ($userDetails->motivation_letter)
                                                        <a href="{{ asset('storage/' . $userDetails->motivation_letter) }}"
                                                            target="_blank">View motivation letter</a>
                                                    @else
                                                        Not Provided
                                                    @endif
                                                </li>
                                                <li class="list-group-item"><strong>Resume:</strong>
                                                    @if ($userDetails->resume)
                                                        <a href="{{ asset('storage/' . $userDetails->resume) }}"
                                                            target="_blank">View resume</a>
                                                    @else
                                                        Not Provided
                                                    @endif
                                                </li>
                                                <li class="list-group-item"><strong>Cover letter:</strong>
                                                    @if ($userDetails->cover_letter)
                                                        <a href="{{ asset('storage/' . $userDetails->cover_letter) }}"
                                                            target="_blank">View cover letter</a>
                                                    @else
                                                        Not Provided
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                        data-bs-target="#createUserDetailsModal">
                                        Edit Details
                                    </button>
                                </div>

                            </div>
                        </div>
                        @include('frontend.layouts.applist')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal to Create User Details -->
    <div class="modal fade" id="createUserDetailsModal" tabindex="-1" aria-labelledby="createUserDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserDetailsModalLabel">Create User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.details.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                            @error('date_of_birth')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Place of Study -->
                        <div class="mb-3">
                            <label for="place_of_study" class="form-label">Place of Study</label>
                            <input type="text" class="form-control" id="place_of_study" name="place_of_study"
                                required>
                            @error('place_of_study')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Passport Copy -->
                        <div class="mb-3">
                            <label for="passport_copy" class="form-label">Passport Copy (Optional)</label>
                            <input type="file" class="form-control" id="passport_copy" name="passport_copy"
                                accept="application/pdf,image/jpeg,image/png">
                            @error('passport_copy')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirmation Letter -->
                        <div class="mb-3">
                            <label for="confirmation_letter" class="form-label">Confirmation Letter (Optional)</label>
                            <input type="file" class="form-control" id="confirmation_letter"
                                name="confirmation_letter" accept="application/pdf,image/jpeg,image/png">
                            @error('confirmation_letter')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Academic Transcript -->
                        <div class="mb-3">
                            <label for="academic_transcript" class="form-label">Academic Transcript (Optional)</label>
                            <input type="file" class="form-control" id="academic_transcript"
                                name="academic_transcript" accept="application/pdf,image/jpeg,image/png">
                            @error('academic_transcript')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Motivation Letter -->
                        <div class="mb-3">
                            <label for="motivation_letter" class="form-label">Motivation Letter (Optional)</label>
                            <input type="file" class="form-control" id="motivation_letter" name="motivation_letter"
                                accept="application/pdf,image/jpeg,image/png">
                            @error('motivation_letter')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Resume -->
                        <div class="mb-3">
                            <label for="resume" class="form-label">Resume (Optional)</label>
                            <input type="file" class="form-control" id="resume" name="resume"
                                accept="application/pdf,image/jpeg,image/png">
                            @error('resume')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cover Letter -->
                        <div class="mb-3">
                            <label for="cover_letter" class="form-label">Cover Letter (Optional)</label>
                            <input type="file" class="form-control" id="cover_letter" name="cover_letter"
                                accept="application/pdf,image/jpeg,image/png">
                            @error('cover_letter')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
