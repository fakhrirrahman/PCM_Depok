@extends('layouts.app')

@section('title', 'Our Services')

@section('content')

<!-- Page Title -->
<div class="page-title accent-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Contact</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="current">Contact</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Contact Section -->
<section id="contact" class="contact section">
    <div class="mb-5">
        <iframe style="width: 100%; height: 400px;"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63252.241951403346!2d110.36559026953125!3d-7.761682799999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5929e00f4c75%3A0x9d860bf72f8a7d33!2sPimpinan%20Cabang%20Muhammadiyah%20Depok%20Sleman!5e0!3m2!1sid!2sid!4v1741247849890!5m2!1sid!2sid"
            frameborder="0" allowfullscreen=""></iframe>
    </div><!-- End Google Maps -->

    <div class="container" data-aos="fade">
        <div class="row gy-5 gx-lg-5">
            <div class="col-lg-4">
                <div class="info">
                    <h3>Get in touch</h3>
                    <p>Silakan hubungi kami untuk pertanyaan atau informasi lebih lanjut.</p>
                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            <p>Ruko Gorongan, Jl. Perumnas No.1, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman,
                                Daerah Istimewa Yogyakarta 55283</p>
                        </div>
                    </div>
                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>
                    </div>
                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <form action="{{ route('contact.submit') }}" method="post" class="php-email-form">
                    @csrf

                    <!-- Nama -->
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Your Name" value="{{ old('name') }}" required minlength="3"
                            maxlength="100">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group mt-3">
                        <label for="email">Your Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="Your Email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Subject -->
                    <div class="form-group mt-3">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject"
                            id="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                        @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Pesan -->
                    <div class="form-group mt-3">
                        <label for="message">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                            id="message" placeholder="Your Message" required>{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section><!-- /Contact Section -->

@endsection