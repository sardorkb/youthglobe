@extends('layouts.master')
@section('title', 'Our Programs | Youth Globe')
@section('main-content')

    <!-- Page Header Section -->
    <header class="bg-gradient-info text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 text-white">Explore Our Programs</h1>
            <p class="lead">Find the best opportunities for your personal and professional growth.</p>
        </div>
    </header>

    <!-- ------- START SEARCH SECTION -------- -->
    <div class="card card-body mx-3 mx-md-4 mt-n3 bg-gradient-white border-0 shadow-lg">
        <div class="py-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 mx-3 mx-md-4">
                        <form class="d-flex align-items-center justify-between">
                            <!-- Input Field -->
                            <div class="input-group input-group-static w-100 mb-4">
                                <label for="keyword" class="form-label">Program name, type, or keyword</label>
                                <input type="search" class="form-control form-control-lg" id="keyword">
                            </div>
                            <!-- Search Button -->
                            <div class="col-md-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-75 ms-5">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------- END SEARCH SECTION -------- -->

    <section class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Programs Section -->
                <div class="row">
                    @foreach ($programs as $program)
                        <div class="col-lg-12 col-md-6">
                            <div class="card shadow-sm mb-4" style="cursor: pointer;">
                                <div class="card-body">
                                    <h4 class="text-dark">{{ $program->name }}</h4>
                                    <p>{{ Str::limit($program->description ?? 'No description available', 250) }}</p>
                                    
                                    <!-- Additional Details with Icons -->
                                    <div class="row small">
                                        <div class="col-md-6 d-flex align-items-center mb-2">
                                            <i class="fas fa-building me-2 text-info"></i> 
                                            <span>{{ $program->partner->details->company_name }}</span>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center mb-2">
                                            <i class="fas fa-calendar-alt me-2 text-info"></i> 
                                            <span>Est. {{ $program->partner->details->year_of_establishment }}</span>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center mb-2">
                                            <i class="fas fa-location-arrow me-2 text-info"></i> 
                                            <span>{{ $program->location }}</span>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center mb-2">
                                            <i class="fas fa-tag me-2 text-info"></i> 
                                            <span>{{ $program->type }}</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Apply Button (Submit Form) -->
                                    <div class="text-center mt-3">
                                        <form action="{{ route('frontend.program.apply') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="program_id" value="{{ $program->id }}">
                                            <div class="form-group">
                                                <label for="description">Why do you want to apply for this program?</label>
                                                <textarea class="form-control" name="description" rows="3" placeholder="Write a brief description..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-lg mt-3">Apply Now</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Section -->
                <div class="d-flex justify-content-center">
                    {{ $programs->links() }}
                </div>

            </div>

            <div class="col-lg-4 sidebar">
                <div class="widgets-container">
                    <h5 class="mb-4">Filter & Sort</h5>

                    <!-- Sort Options -->
                    <div class="input-group input-group-static mb-3">
                        <label for="sortBy" class="ms-0">Sort By</label>
                        <select class="form-control" id="sortBy">
                            <option>Relevance</option>
                            <option>Name (A-Z)</option>
                            <option>Name (Z-A)</option>
                            <option>Newest First</option>
                            <option>Oldest First</option>
                        </select>
                    </div>

                    <!-- Filter by Program Type -->
                    <div class="input-group input-group-static mb-3">
                        <label for="programType" class="ms-0">Program Type</label>
                        <select class="form-control" id="programType">
                            <option>All Types</option>
                            <option>Hospitality</option>
                            <option>Tourism</option>
                            <option>Retail</option>
                            <option>Agriculture</option>
                        </select>
                    </div>

                    <!-- Filter by Rating -->
                    <div class="input-group input-group-static mb-3">
                        <label for="ratingFilter" class="ms-0">Minimum Rating</label>
                        <select class="form-control" id="ratingFilter">
                            <option>Any Rating</option>
                            <option value="5">5 Stars</option>
                            <option value="4">4 Stars & Up</option>
                            <option value="3">3 Stars & Up</option>
                            <option value="2">2 Stars & Up</option>
                            <option value="1">1 Star & Up</option>
                        </select>
                    </div>

                    <!-- Reset Filters Button -->
                    <div class="read-more">
                        <button class="btn btn-get-started">Reset filters</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
