@extends('layouts.master')
@section('title', 'Our partners | Youth Globe')
@section('main-content')
    <!-- Page Header Section -->
    <header class="bg-gradient-info text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 text-white">Explore Our Partners</h1>
            <p class="lead">We collaborate with industry leaders to bring the best opportunities to our community.</p>
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
                                <label for="keyword" class="form-label">Company name, location or keyword</label>
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
                <!-- Partners Section -->
                <div class="row">
                    @foreach ($partners as $partner)
                        <div class="col-lg-12 col-md-6">
                            <div class="card shadow-sm mb-4" onclick="window.location.href='{{ route('frontend.partner.details', $partner->id) }}'" style="cursor: pointer;">
                                <div class="card-body">
                                    <h4 class="text-dark">{{ $partner->details->company_name }}</h4>
                                    <p>{{ Str::limit($partner->details->description ?? 'No description available', 250) }}</p>
                            
                                    <!-- Additional Details with Icons -->
                                    <div class="row small"> <!-- 'small' class makes text smaller -->
                                        <div class="col-md-4 d-flex align-items-center mb-2">
                                            <i class="fas fa-laptop-code me-2 text-info"></i> 
                                            <span>{{ $partner->programs_count }} Total 12 Programs</span>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center mb-2">
                                            <i class="fas fa-building me-2 text-info"></i> 
                                            <span>
                                                @if($partner->details->type === 'local')
                                                    Within Uzbekistan
                                                @else
                                                    Outside Uzbekistan
                                                @endif
                                            </span>
                                        </div>
                                        
                                        <div class="col-md-4 d-flex align-items-center mb-2">
                                            <i class="fas fa-calendar-alt me-2 text-info"></i> 
                                            <span>Est. {{ $partner->details->year_of_establishment }}</span>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center mb-2">
                                            <i class="fas fa-map-marker-alt me-2 text-info"></i> 
                                            <span>{{ $partner->details->address }}</span>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center mb-2">
                                            <i class="fas fa-phone-alt me-2 text-info"></i> 
                                            <span>{{ $partner->details->phone_number }}</span>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center mb-3">
                                            <i class="fas fa-link me-2 text-info"></i> 
                                            <a href="{{ $partner->details->website_link }}" target="_blank" class="text-primary" onclick="event.stopPropagation();">
                                                {{ $partner->details->website_link }}
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Section -->
                <div class="d-flex justify-content-center">
                    {{ $partners->links() }}
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


    <section class="mt-3 mb-0 py-5 bg-gradient-info">
        <div class="container">
            <div class="row align-items-center">
                <!-- Right Column: Icon or Decorative Element -->
                <div class="col-lg-6">
                    <div class="d-flex justify-content-center align-items-center flex-column text-white">
                        <h1 class="display-3 mb-3 text-white"
                            style="font-family: 'Playfair Display', serif; font-weight: bold;"><i>Join Our Mission</i></h1>
                        <h4 class="display-4 mb-3 text-center text-white" style="font-family: 'Playfair Display', serif;">
                            <i>Empower Global Communities</i>
                        </h4>
                        <p class="opacity-75 text-center" style="font-family: 'Roboto', sans-serif;">By becoming a
                            partner, you collaborate in creating transformative experiences that foster cultural exchange
                            and global understanding.</p>
                    </div>
                </div>

                <!-- Left Column: Content -->
                <div class="col-lg-6">
                    <h2 class="text-white mb-4">Become a Partner</h2>
                    <p class="text-white opacity-75 mb-4">Partnering with us means joining a global network dedicated to
                        empowering individuals and communities through cultural and educational exchanges. Together, we can
                        make a lasting impact!</p>

                    <h4 class="text-white mb-3">Why Partner with Us?</h4>
                    <div class="d-flex flex-column text-white opacity-75">
                        <div class="d-flex mb-2">
                            <i class="material-icons me-2">verified</i> Contribute to life-changing cultural exchange
                            programs.
                        </div>
                        <div class="d-flex mb-2">
                            <i class="material-icons me-2">verified</i> Strengthen your organization's global reach and
                            influence.
                        </div>
                        <div class="d-flex mb-2">
                            <i class="material-icons me-2">verified</i> Collaborate on initiatives that promote personal
                            and professional growth.
                        </div>
                    </div>

                    <a href="{{ route('partner.register') }}" class="btn btn-white btn-lg mt-4">Apply to Become a Partner</a>
                </div>

                <div class="position-absolute end-0 bottom-0"
                    style="width: 150px; height: 150px; background-color: rgba(255, 255, 255, 0.1); border-radius: 50%;">
                </div>
            </div>
        </div>
    </section>

@endsection
