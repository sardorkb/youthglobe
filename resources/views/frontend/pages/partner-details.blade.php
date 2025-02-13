@extends('layouts.master')
@section('title', 'Partner Details | Youth Globe')

@section('main-content')
<div class="container my-5">
    <!-- Header Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body p-4 d-flex align-items-center">
            <img src="https://via.placeholder.com/100" alt="Partner Logo" class="rounded-circle me-3" style="width: 100px; height: 100px;">
            <div>
                <h2 class="text-dark">{{ $partner->details->company_name ?? 'Partner Name' }}</h2>
                <p class="text-muted"><i class="fas fa-map-marker-alt text-info me-1"></i> {{ $partner->details->address ?? 'No address provided.' }}</p>
            </div>
        </div>
    </div>

    <!-- Partner Details Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="text-dark mb-4">About the Partner</h4>
            <div class="row">
                <div class="col-md-6 d-flex align-items-center mb-3">
                    <i class="fas fa-laptop-code text-info me-2"></i>
                    <span>{{ $partner->programs_count ?? '0' }} Programs</span>
                </div>
                <div class="col-md-6 d-flex align-items-center mb-3">
                    <i class="fas fa-building text-info me-2"></i>
                    <span>
                        @if($partner->details->type === 'local')
                            Within Uzbekistan
                        @else
                            Outside Uzbekistan
                        @endif
                    </span>
                </div>
                <div class="col-md-6 d-flex align-items-center mb-3">
                    <i class="fas fa-calendar-alt text-info me-2"></i>
                    <span>Established: {{ $partner->details->year_established ?? 'N/A' }}</span>
                </div>
                <div class="col-md-6 d-flex align-items-center mb-3">
                    <i class="fas fa-phone-alt text-info me-2"></i>
                    <span>{{ $partner->details->phone_number ?? 'N/A' }}</span>
                </div>
                <div class="col-md-6 d-flex align-items-center mb-3">
                    <i class="fas fa-link text-info me-2"></i>
                    <a href="{{ $partner->details->website_link ?? '#' }}" target="_blank" class="text-primary">
                        Visit Website
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Programs Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="text-dark mb-4">Programs Offered</h4>
            <div class="row">
                @foreach(range(1, 3) as $program)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Program {{ $program }}</h5>
                            <p class="card-text">This is a dummy description for Program {{ $program }}. Learn more about this exciting program.</p>
                        </div>
                        <div class="card-footer text-end">
                            <a href="#" class="btn btn-primary btn-sm">Learn More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
