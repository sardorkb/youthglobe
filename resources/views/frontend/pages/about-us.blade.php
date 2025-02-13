@extends('layouts.master')
@section('title', 'About Us | Youth Globe')
@section('main-content')
    <header class="bg-gradient-dark">
        <div class="page-header min-vh-75" style="background-image: url('{{ asset('img/bg5.jpg') }}');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center mx-auto my-auto">
                        <h3 class="text-white">Youth Globe Work and Travel Agency was established with the
                            mission to bridge
                            cultures and create opportunities for individuals to explore the world while gaining valuable
                            life
                            experiences.
                            What began as a small initiative soon grew into a trusted agency empowering young people to
                            broaden their
                            horizons.</h3>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="card card-body mx-3 mx-md-4 mt-n6 bg-gradient-info border-0">
        <!-- -------   START SEARCH SECTION    -------- -->
        <div class="py-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h3 class="text-white text-center">Founded with a Vision 2025</h3>
                        <p class="text-center text-white mb-4">Youth Globe Work and Travel Agency was established with the
                            mission to bridge
                            cultures and create opportunities for individuals to explore the world while gaining valuable
                            life
                            experiences.
                            What began as a small initiative soon grew into a trusted agency empowering young people to
                            broaden their
                            horizons.</p>
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
                    <img src="{{ asset('img/aboutus.jpg') }}" class="img-fluid" alt="Work and Travel Program"
                        style="border-radius: 25px;">
                </div>
                <div class="col-lg-7 order-2 order-lg-1 content">
                    <h3>Our mission</h3>
                    <p class="fst-italic">
                        At Youth Globe Work and Travel Agency, our mission is to empower individuals to embrace the world as
                        global citizens through transformative cultural exchange experiences.
                    </p>
                    <p class="text-justify">
                        We believe that experiencing new cultures, meeting diverse people, and gaining valuable work
                        experience abroad can be life-changing.

                        We connect ambitious explorers with international opportunities that promote personal growth,
                        professional development, and a profound appreciation for cultural diversity. By facilitating
                        seamless pathways to work, study, and travel, we strive to break down barriers and open doors to new
                        horizons.

                        Our programs are designed to inspire lifelong connections and meaningful interactions between people
                        from all walks of life. We are committed to enriching lives by fostering cross-cultural
                        understanding, nurturing leadership skills, and building confidence in navigating an interconnected
                        world.

                        With a focus on accessibility, inclusivity, and excellence, Youth Globe is dedicated to helping
                        individuals realize their full potential while contributing to the global community. We envision a
                        world where cultural exchange bridges gaps, broadens perspectives, and cultivates empathy, leaving a
                        lasting positive impact on every journey.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="section about">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">

                <div class="col-lg-7 order-1 order-lg-2 content">
                    <h3>Our vision</h3>
                    <p class="fst-italic">
                        We aspire to be the leading platform for empowering individuals to explore the world, unlocking
                        their potential while building bridges across cultures and continents.
                    </p>
                    <p class="text-justify">
                        We envision a world where boundaries dissolve, and every individual has the
                        opportunity to embrace global citizenship through meaningful experiences. Our goal is to become a
                        leading force in connecting people with opportunities that build cultural understanding, enhance
                        professional skills, and cultivate a shared commitment to a more inclusive and interconnected world.
                        Together, we strive to make global exploration an essential step in shaping the leaders and
                        changemakers of tomorrow.
                    </p>
                    <p class="text-justify">By inspiring exploration and facilitating opportunities, we aim to transform
                        travel into a journey of growth, connection, and lifelong impact, making the world a better
                        place—one exchange at a time.</p>
                </div>
                <div class="col-lg-5 order-2 order-lg-1">
                    <img src="{{ asset('img/vision.jpg') }}" class="img-fluid" alt="Work and Travel Program"
                        style="border-radius: 25px;">
                </div>
            </div>
        </div>
    </section>


    <section class="pt-4 pb-0" id="count-stats">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-3">
                    <h1 class="text-info" id="state1" countTo="5234">0</h1>
                    <h5 class="text-info">Projects</h5>
                    <p class="text-info">Of “high-performing” level are led by a certified project manager</p>
                </div>
                <div class="col-md-3">
                    <h1 class="text-info"><span id="state2" countTo="3400">0</span>+</h1>
                    <h5 class="text-info">Hours</h5>
                    <p class="text-info">That meets quality standards required by our users</p>
                </div>
                <div class="col-md-3">
                    <h1 class="text-info"><span id="state3" countTo="24">0</span>/7</h1>
                    <h5 class="text-info">Support</h5>
                    <p class="text-info">Actively engage team members that finishes on time</p>
                </div>
            </div>
        </div>
    </section>

    <section class="my-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-start mb-5 mt-5">
                    <h3 class="z-index-1 position-relative">Our journey</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- First Column of Timeline -->
                <div class="col-lg-6">
                    <div class="timeline timeline-one-side">
                        <!-- Milestone 1 -->
                        <div class="timeline-block">
                            <span class="timeline-step bg-primary text-white">
                                <i class="material-icons">people</i>
                            </span>
                            <div class="timeline-content">
                                <h5 class="font-weight-bold">First 100 Participants Enrolled</h5>
                                <p class="text-muted mb-0">Successfully guided our first cohort of participants through
                                    international work and travel programs.</p>
                                <small class="text-muted">Year</small>
                            </div>
                        </div>

                        <!-- Milestone 2 -->
                        <div class="timeline-block">
                            <span class="timeline-step bg-success text-white">
                                <i class="material-icons">handshake</i>
                            </span>
                            <div class="timeline-content">
                                <h5 class="font-weight-bold">Global Partnerships Established</h5>
                                <p class="text-muted mb-0">Partnered with renowned organizations and employers to expand
                                    opportunities.</p>
                                <small class="text-muted">Year</small>
                            </div>
                        </div>

                        <!-- Milestone 3 -->
                        <div class="timeline-block">
                            <span class="timeline-step bg-warning text-white">
                                <i class="material-icons">verified</i>
                            </span>
                            <div class="timeline-content">
                                <h5 class="font-weight-bold">Recognition by Local Authorities</h5>
                                <p class="text-muted mb-0">Earned accreditation from local government bodies for promoting
                                    cultural exchange.</p>
                                <small class="text-muted">Year</small>
                            </div>
                        </div>

                        <!-- Milestone 4 -->
                        <div class="timeline-block">
                            <span class="timeline-step bg-info text-white">
                                <i class="material-icons">work</i>
                            </span>
                            <div class="timeline-content">
                                <h5 class="font-weight-bold">Program Diversification</h5>
                                <p class="text-muted mb-0">Introduced new offerings such as Au Pair, Internship Abroad, and
                                    Volunteer Programs.</p>
                                <small class="text-muted">Year</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Column of Timeline -->
                <div class="col-lg-6">
                    <div class="timeline timeline-one-side">
                        <!-- Milestone 5 -->
                        <div class="timeline-block">
                            <span class="timeline-step bg-danger text-white">
                                <i class="material-icons">public</i>
                            </span>
                            <div class="timeline-content">
                                <h5 class="font-weight-bold">Reached 10,000+ Participants</h5>
                                <p class="text-muted mb-0">Celebrated over 10,000 students and professionals gaining global
                                    exposure.</p>
                                <small class="text-muted">Year</small>
                            </div>
                        </div>

                        <!-- Milestone 6 -->
                        <div class="timeline-block">
                            <span class="timeline-step bg-secondary text-white">
                                <i class="material-icons">laptop</i>
                            </span>
                            <div class="timeline-content">
                                <h5 class="font-weight-bold">Launch of Online Application Portal</h5>
                                <p class="text-muted mb-0">Streamlined operations with an online portal for seamless
                                    participant tracking.</p>
                                <small class="text-muted">Year</small>
                            </div>
                        </div>

                        <!-- Milestone 7 -->
                        <div class="timeline-block">
                            <span class="timeline-step bg-primary text-white">
                                <i class="material-icons">map</i>
                            </span>
                            <div class="timeline-content">
                                <h5 class="font-weight-bold">Expanding Horizons to New Destinations</h5>
                                <p class="text-muted mb-0">Added several new countries to our program portfolio.</p>
                                <small class="text-muted">Year</small>
                            </div>
                        </div>

                        <!-- Milestone 8 -->
                        <div class="timeline-block">
                            <span class="timeline-step bg-success text-white">
                                <i class="material-icons">emoji_events</i>
                            </span>
                            <div class="timeline-content">
                                <h5 class="font-weight-bold">Award for Excellence in Cultural Exchange</h5>
                                <p class="text-muted mb-0">Honored for our dedication to promoting global citizenship.</p>
                                <small class="text-muted">Year</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="team" class="team section my-5 py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-start mb-5 mt-5">
                    <h3 class="z-index-1 position-relative">The Executive Team</h3>
                    <p class="opacity-8 mb-0">There’s nothing I really wanted to do in life that I wasn’t able
                        to get good at. That’s my skill.</p>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="{{ asset('img/team/team-1.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="member-info">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                            <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""> <i class="bi bi-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="{{ asset('img/team/team-2.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="member-info">
                            <h4>Sarah Jhonson</h4>
                            <span>Product Manager</span>
                            <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""> <i class="bi bi-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="{{ asset('img/team/team-3.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                            <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""> <i class="bi bi-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="{{ asset('img/team/team-4.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="member-info">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                            <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""> <i class="bi bi-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->
            </div>
        </div>
    </section>

@endsection