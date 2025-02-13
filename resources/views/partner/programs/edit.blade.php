@extends('layouts.master')

@section('title', 'Edit Program - Partner Page')

@section('main-content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <header class="bg-gradient-info text-white text-center pt-3 pb-1">
        <div class="container">
            <h1 class="display-4 text-white">Edit Program</h1>
            <p class="lead">Make changes to your program details.</p>
        </div>
    </header>

    <div class="container-fluid my-5">
        <div class="row">
            <!-- Sidebar with Partner Info -->
            @include('partner.layouts.sidebar')

            <!-- Program Edit Form -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-gradient-info">
                        <h5 class="mb-0 text-white">Edit Program Details</h5>
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

                        <form action="{{ route('program.update', $program->slug) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        
                            <!-- Program Title and Country -->
                            <div class="row mb-4">
                                <div class="col-12 col-md-6">
                                    <div class="input-group input-group-outline my-3 @if(old('title', $program->title)) is_filled @endif">
                                        <label for="title" class="form-label">Program Title</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $program->title) }}" required>
                                        @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="input-group input-group-outline my-3 @if(old('country', $program->country)) is_filled @endif">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" name="country" id="country" class="form-control" value="{{ old('country', $program->country) }}" required>
                                        @error('country')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Start, End Date, Duration, Deadline -->
                            <div class="row mb-4">
                                <div class="col-12 col-md-3">
                                    <div class="input-group input-group-outline my-3 @if(old('start_date', $program->start_date)) is_filled @endif">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $program->start_date->format('Y-m-d')) }}" required>
                                        @error('start_date')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="input-group input-group-outline my-3 @if(old('end_date', $program->end_date)) is_filled @endif">
                                        <label for="end_date" class="form-label">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $program->end_date->format('Y-m-d')) }}" required>
                                        @error('end_date')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="input-group input-group-outline my-3 @if(old('duration', $program->duration)) is_filled @endif">
                                        <label for="duration" class="form-label">Duration</label>
                                        <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration', $program->duration) }}" required>
                                        @error('duration')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="input-group input-group-outline my-3 @if(old('deadline', $program->deadline)) is_filled @endif">
                                        <label for="deadline" class="form-label">Application Deadline</label>
                                        <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline', $program->deadline->format('Y-m-d')) }}" required>
                                        @error('deadline')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Description and Requirements -->
                            <div class="input-group input-group-outline my-3 @if(old('description', $program->description)) is_filled @endif">
                                <label for="description" class="form-label">Program Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $program->description) }}</textarea>
                                @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        
                            <div class="input-group input-group-outline my-3 @if(old('requirements', $program->requirements)) is_filled @endif">
                                <label for="requirements" class="form-label">Requirements</label>
                                <textarea name="requirements" id="requirements" class="form-control" rows="4">{{ old('requirements', $program->requirements) }}</textarea>
                                @error('requirements')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        
                            <!-- Image, Cost, and Status -->
                            <div class="row mb-4">
                                <div class="col-12 col-md-4">
                                    <div class="input-group input-group-outline my-3 @if(old('image', $program->image)) is_filled @endif">
                                        <label for="image" class="form-label">Program Image</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                        @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                                        @if ($program->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $program->image) }}" alt="Program Image" class="img-thumbnail" width="150">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="input-group input-group-outline my-3 @if(old('cost', $program->cost)) is_filled @endif">
                                        <label for="cost" class="form-label">Program Fee (USD)</label>
                                        <input type="number" name="cost" id="cost" class="form-control" value="{{ old('cost', $program->cost) }}" required>
                                        @error('cost')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="input-group input-group-outline my-3 @if(old('status', $program->status)) is_filled @endif">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="active" {{ old('status', $program->status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status', $program->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Submit Button -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Update Program</button>
                                <a href="{{ route('partner.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
