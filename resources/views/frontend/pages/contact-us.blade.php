@extends('layouts.master')

@section('title', 'Contact Us | Youth Globe')

@section('main-content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Contact</li>
                </ol>
            </nav>
            <h1>We’d love to hear from you! Reach out to us for any inquiries or support.</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <p>123 Street, City/Town, Region</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                        data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Call Us</h3>
                        <p>+998 00 123 45 67</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                        data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p>info@youthglobe.uz</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2997.589433907403!2d69.22638597587371!3d41.29603917131164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b00585d86cf%3A0x546a325a5af65e16!2sMillat%20Umidi%20University!5e0!3m2!1sen!2s!4v1737090603353!5m2!1sen!2s"
                        frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="col-lg-6">
                    <form role="form" id="contact-form" method="post" autocomplete="off">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-dynamic mb-4">
                                        <label class="form-label">First Name</label>
                                        <input class="form-control" aria-label="First Name..." type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 ps-2">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Last Name...">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label">Phone Number</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="input-group mb-4 input-group-static">
                                <label>Your message</label>
                                <textarea name="message" class="form-control" id="message" rows="5"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-switch mb-4 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                            checked="">
                                        <label class="form-check-label ms-3 mb-0" for="flexSwitchCheckDefault">I agree to
                                            the <a href="javascript:;" class="text-dark"><u>Terms and
                                                    Conditions</u></a>.</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn bg-gradient-info w-100">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
