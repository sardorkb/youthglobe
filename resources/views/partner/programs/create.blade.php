@extends('layouts.master')
@section('title', 'Create New Program')
@section('main-content')
    <header class="bg-gradient-info text-white text-center pt-3 pb-1">
        <div class="container">
            <h1 class="display-4 text-white">Create New Program</h1>
            <p class="lead">Fill in the details to create a new program.</p>
        </div>
    </header>
    <div class="container-fluid my-5">
        <div class="row">
            <!-- Sidebar with Partner Info -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-gradient-info">
                        <h5 class="mb-0 text-white">General Information</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Name: </strong>{{ $partnerDetails->company_name }} </li>
                            <li class="list-group-item"><strong>Email: </strong> {{ Auth::user()->email }}</li>
                            <li class="list-group-item"><strong>Joined:</strong>
                                {{ Auth::user()->created_at->format('d M, Y') }}</li>
                            <li class="list-group-item"><strong>Status:</strong>
                                <span class="badge {{ Auth::user()->status == 'active' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst(Auth::user()->status) }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header bg-gradient-info">
                        <h5 class="mb-0 text-white">Useful links</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Change password</li>
                            <li class="list-group-item">Contact admin</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Form to create a new program -->
                <div class="card">
                    <div class="card-header bg-gradient-info">
                        <h5 class="mb-0 text-white">Program Details</h5>
                    </div>
                    <div class="card-body">
                        <!-- Display validation errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-4">
                                <!-- Program Title -->
                                <div class="col-12 col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="title" class="form-label">Program Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title') }}" required>
                                    </div>
                                </div>

                                <!-- Country -->
                                <div class="col-12 col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="country" name="country"
                                            value="{{ old('country') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <!-- Start Date -->
                                <div class="col-12 col-md-3">
                                    <div class="input-group input-group-outline my-3 ">
                                        <label for="start_date" class="form-label is_filled">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date"
                                            value="{{ old('start_date') }}" required>
                                    </div>
                                </div>

                                <!-- End Date -->
                                <div class="col-12 col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="end_date" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date"
                                            value="{{ old('end_date') }}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="duration" class="form-label">Duration</label>
                                        <input type="text" class="form-control" id="duration" name="duration"
                                            value="{{ old('duration') }}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="deadline" class="form-label">Application Deadline</label>
                                        <input type="date" class="form-control" id="deadline" name="deadline"
                                            value="{{ old('deadline') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label for="description" class="form-label">Program Description</label>
                                <input class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</input>
                            </div>

                            <div class="input-group input-group-outline my-3">
                                <label for="requirements" class="form-label">Requirements</label>
                                <input class="form-control" id="requirements" name="requirements" rows="4">{{ old('requirements') }}</input>
                            </div>

                            <div class="row mb-4">
                                <!-- Program Image -->
                                <div class="col-12 col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                </div>

                                <!-- Program Cost -->
                                <div class="col-12 col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="cost" class="form-label">Program Fee (USD)</label>
                                        <input type="number" class="form-control" id="cost" name="cost"
                                            value="{{ old('cost') }}" required>
                                    </div>
                                </div>

                                <!-- Program Status -->
                                <div class="col-12 col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Create Program</button>
                                <a href="{{ route('partner.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
