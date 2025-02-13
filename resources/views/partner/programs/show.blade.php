@extends('layouts.master')
@section('title', $program->title)
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
            <div class="col-md-9">
                <!-- Program Details -->
                <div class="card">
                    <div class="card-header bg-gradient-info text-white">
                        <h3 class="card-title">Program name: {{ $program->title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <!-- Program Details (Country, Duration, Start Date, End Date, Cost) in another col-6 -->
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm border-light mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4 text-info">Program Details</h5>

                                        <!-- Country, Duration, and Dates in a row -->
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <p class="mb-1"><strong>Country:</strong> {{ $program->country }}</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="mb-1"><strong>Duration:</strong> {{ $program->duration }}</p>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <p class="mb-1"><strong>Start Date:</strong>
                                                    {{ \Carbon\Carbon::parse($program->start_date)->format('d M, Y') }}</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="mb-1"><strong>End Date:</strong>
                                                    {{ \Carbon\Carbon::parse($program->end_date)->format('d M, Y') }}</p>
                                            </div>
                                        </div>

                                        <p class="mb-1"><strong>Cost:</strong> ${{ number_format($program->cost, 2) }}
                                        </p>
                                        <p class="mb-3"><strong>Application Deadline:</strong>
                                            {{ \Carbon\Carbon::parse($program->deadline)->format('d M, Y') }}</p>

                                        <!-- Program status badge -->
                                        <span
                                            class="badge {{ $program->status == 'active' ? 'bg-success' : 'bg-danger' }} mt-3">
                                            {{ ucfirst($program->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Image in a col-6 -->
                            @if ($program->image)
                                <div class="col-12 col-md-6 text-center">
                                    <img src="{{ asset('storage/' . $program->image) }}" alt="Program Image"
                                        class="img-fluid rounded" style="max-width: 390px; height: auto;">
                                </div>
                            @endif
                        </div>

                        <h4 class="text-info">Requirements</h4>
                        <!-- Requirements, Deadline, and Description -->
                        <p class="fst-italic">{{ $program->requirements }}</p>

                        <h4 class="text-info">Description</h4>
                        <p class="fst-justify">{{ $program->description }}</p>

                        <!-- Back to Dashboard and Status -->
                        <!-- Back to Dashboard and Edit Button -->
                        <div class="mb-3 d-flex gap-2">
                            <a href="{{ route('partner.index') }}" class="btn btn-secondary">Back to list</a>
                            <a href="{{ route('program.edit', $program->slug) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('program.destroy', $program->slug) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this program?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
