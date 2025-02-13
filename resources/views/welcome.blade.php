@extends('layouts.master')
@section('title', 'Youth Globe')
@section('main-content')

    <header class="header-2">
        <div class="page-header min-vh-75 relative"
            style="background-image: url('{{ asset('img/home.png') }}'); background-size: cover;">
            <span class="mask"></span>
            <div class="container position-relative z-index-2">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6 col-md-7 text-center text-md-start">
                        <h2 class="display-3 font-weight-bold mb-4" style="font-family: 'Lobster', cursive; color: #333333;">
                            Youth Globe</h2>
                        <p class="lead text-dark opacity-8 mb-4" style="font-family: 'Tajawal', sans-serif;">
                            Explore new cultures, build global connections, and embark on exciting adventures worldwide.
                            Join us in discovering the beauty of the world and unlocking the door to endless opportunities.
                            Your journey starts here!
                        </p>
                        <button href="#join" class="btn btn-get-started btn-lg mt-4">Join Now</button>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="card card-body mx-3 mx-md-4 mt-n6 bg-gradient-info border-0">
        <!-- -------   START SEARCH SECTION    -------- -->
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="mb-1 text-center text-white">What programs are <i><strong>you</strong></i> looking for?
                        </h1>
                    </div>
                </div><br>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form class="row g-3 align-items-center">
                            <div class="col-md-3">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0 text-white">Country</label>
                                    <select class="form-control text-white" id="exampleFormControlSelect1"
                                        style="background-color: transparent;">
                                        <option class="text-dark">Uzbekistan</option>
                                        <option class="text-dark">Kazakhstan</option>
                                        <option class="text-dark">Russia</option>
                                        <option class="text-dark">Tajikistan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0 text-white">Program</label>
                                    <select class="form-control text-white" id="exampleFormControlSelect1"
                                        style="background-color: transparent;">
                                        <option class="text-dark">Work and travel</option>
                                        <option class="text-dark">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-static mb-4">
                                    <label class="text-white">Term</label>
                                    <select class="form-control text-white bg-gradient-dark" id="exampleFormControlSelect1"
                                        style="background-color: transparent;">
                                        <option class="text-dark">Fall 2025</option>
                                        <option class="text-dark">Spring 2026</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-white w-100">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------   END SEARCH SECTION    -------- -->
    </div>
    <section id="about" class="section about">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-5 order-1 order-lg-2">
                    <img src="{{ asset('img/abouthome.jpg') }}" class="img-fluid" alt="Work and Travel Program"
                        style="border-radius: 25px;">
                </div>

                <div class="col-lg-7 order-2 order-lg-1 content">
                    <h3>Join the Work and Travel Program</h3>
                    <p class="fst-italic">
                        Experience new cultures, meet new people, and gain valuable work experience while traveling abroad.
                    </p>
                    <ul>
                        <li><i class="bi bi-check2-all"></i> <span>Work in a variety of job opportunities across the
                                globe.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Explore new countries and cultures during your
                                travels.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Enhance your resume with international work
                                experience.</span></li>
                    </ul>
                    <p class="text-justify">
                        The Work and Travel program offers university students a unique chance to gain real-world experience
                        while exploring exciting international destinations. Whether you're interested in hospitality,
                        customer service, or outdoor adventures, this program provides valuable opportunities to earn money,
                        meet people from around the world, and grow both personally and professionally. It’s not just about
                        working abroad—it’s about experiencing new cultures, overcoming challenges, and building skills that
                        will set you apart in your future career. Join the Work and Travel program and make memories that
                        will last a lifetime!
                    </p>


                </div>
            </div>
        </div>
    </section><!-- /Work and Travel Section -->

    <section id="services" class="services section bg-gradient-info">
        <div class="container">
            <div class="row gy-4">
                <h3 class="text-white text-center text-lg-start mb-4">
                    Work and Travel Program Requirements
                </h3>
                <p class="text-white text-opacity-75 mb-4">
                    Ensure you meet these essential requirements before embarking on your exciting global adventure. Get
                    ready to explore new cultures, gain valuable work experience, and create memories that will last a
                    lifetime!
                </p>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Eligibility Requirements</h3>
                        </a>
                        <p>Must be a full-time university student with a valid student ID. You must be between the ages of
                            18 and 30 to apply.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-card-list"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Required Documents</h3>
                        </a>
                        <p>Valid passport, proof of enrollment, resume, and a recent photo. Additional documents may be
                            required depending on the destination.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Language Skills</h3>
                        </a>
                        <p>Basic knowledge of English is required. Some employers may require advanced language skills
                            depending on the position.</p>
                    </div>
                </div><!-- End Service Item -->

            </div>
        </div>
    </section><!-- /Services Section -->
    <section id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="container section-title text-center text-lg-start mt-3" data-aos="fade-up">
                    <h2>Latest blog posts</h2>
                </div>
                <div class="row">
                    <!-- Blog Post 1 -->
                    <div class="col-md-3">
                        <div class="card h-100 shadow-lg border-0 rounded-3">
                            <div class="position-relative">
                                <img src="{{ asset('img/examples/blog-9-4.jpg') }}" alt="Blog Post 1"
                                    class="card-img-top img-fluid rounded-top-3">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-dark">The Ultimate Guide to Work and Travel around the world
                                </h5>
                                <p class="card-text text-muted">Get ready to dive into the world of work and travel! This
                                    guide
                                    covers everything you need to know before embarking on your adventure.</p>
                                <a href="#" class="btn btn-get-started btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 2 -->
                    <div class="col-md-3">
                        <div class="card h-100 shadow-lg border-0 rounded-3">
                            <div class="position-relative">
                                <img src="{{ asset('img/examples/blog-9-4.jpg') }}" alt="Blog Post 2"
                                    class="card-img-top img-fluid rounded-top-3">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-dark">Top Destinations for Work and Travel Programs</h5>
                                <p class="card-text text-muted">Discover the best destinations for your work and travel
                                    program! Whether you want to explore Europe or Asia, we have the top picks for you.</p>
                                <a href="#" class="btn btn-get-started btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 3 -->
                    <div class="col-md-3">
                        <div class="card h-100 shadow-lg border-0 rounded-3">
                            <div class="position-relative">
                                <img src="{{ asset('img/examples/blog-9-4.jpg') }}" alt="Blog Post 3"
                                    class="card-img-top img-fluid rounded-top-3">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-dark">How to Prepare for Your Work and Travel Journey</h5>
                                <p class="card-text text-muted">Get tips on how to prepare for your work and travel
                                    journey.
                                    From visa applications to packing, this blog has you covered.this blog has you covered.
                                </p>
                                <a href="#" class="btn btn-get-started btn-sm">Read More</a>
                            </div>
                        </div>
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
                            style="font-family: 'Playfair Display', serif; font-weight: bold;"><i>Open Your Home</i></h1>
                        <h3 class="display-4 mb-3 text-white" style="font-family: 'Playfair Display', serif;"><i>Open Your
                                World</i></h3>
                        <p class="opacity-75 text-center" style="font-family: 'Roboto', sans-serif;">By becoming a host,
                            you help bridge cultural gaps and welcome students and young professionals from around the globe
                            to experience life in your community.</p>
                    </div>
                </div>

                <!-- Left Column: Content -->
                <div class="col-lg-6">
                    <h2 class="text-white mb-4">Become a Host</h2>
                    <p class="text-white opacity-75 mb-4">Hosting an international participant brings the world to your
                        doorstep. Share your culture, offer a supportive environment, and gain a rewarding experience as a
                        host!</p>

                    <h4 class="text-white mb-3">Why Become a Host?</h4>
                    <div class="d-flex flex-column text-white opacity-75">
                        <div class="d-flex mb-2">
                            <i class="material-icons me-2">verified</i> Create unforgettable cultural exchange
                            experiences.
                        </div>
                        <div class="d-flex mb-2">
                            <i class="material-icons me-2">verified</i> Help participants grow professionally and
                            personally.
                        </div>
                        <div class="d-flex mb-2">
                            <i class="material-icons me-2">verified</i> Build global connections that last a lifetime.
                        </div>
                    </div>

                    <a href="{{ route('partner.register') }}" class="btn btn-white btn-lg mt-4">Apply to Become a Host</a>
                </div>

                <div class="position-absolute end-0 bottom-0"
                    style="width: 150px; height: 150px; background-color: rgba(255, 255, 255, 0.1); border-radius: 50%;">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto text-center">
                    <h2 class="mb-0 font-weight-bolder">Our partners</h2>
                    <h2 class="text-gradient font-weight-bolder text-success mb-3">Qualified professionals</h2>
                </div>
            </div>

            <hr class="horizontal dark my-3">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6 ms-auto">
                    <img class="w-100 opacity-6" src="{{ asset('img/logos/gray-logos/logo-apple.svg') }}" alt="Logo">
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <img class="w-100 opacity-6" src="{{ asset('img/logos/gray-logos/logo-apple.svg') }}" alt="Logo">
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <img class="w-100 opacity-6" src="{{ asset('img/logos/gray-logos/logo-apple.svg') }}" alt="Logo">
                </div>
                <div class="col-lg-2 col-md-4 col-6 ms-lg-0 ms-md-auto">
                    <img class="w-100 opacity-6" src="{{ asset('img/logos/gray-logos/logo-apple.svg') }}" alt="Logo">
                </div>
                <div class="col-lg-2 col-md-4 col-6 me-md-auto mx-md-0 mx-auto">
                    <img class="w-100 opacity-6" src="{{ asset('img/logos/gray-logos/logo-apple.svg') }}" alt="Logo">
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

@if ($errors->any())
    <script>
        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show(); // Show the modal when there are errors
    </script>
@endif

<script>
    

    // Toggle between login and register forms
    document.getElementById('showRegister').addEventListener('click', function() {
        document.getElementById('loginForm').classList.add('d-none');
        document.getElementById('registerForm').classList.remove('d-none');
    });

    document.getElementById('showLogin').addEventListener('click', function() {
        document.getElementById('registerForm').classList.add('d-none');
        document.getElementById('loginForm').classList.remove('d-none');
    });
</script>

@endpush