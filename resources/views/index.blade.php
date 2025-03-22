@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
@php
use App\Models\Kegiatan;
@endphp
<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
            <img src="{{ asset('Company/assets/img/hero-carousel/hero-carousel-1.jpg') }}" alt="">
            <div class="container">
                <h2>Pimpinan Cabang Muhammadiyah Depok.</h2>
                <p>Pimpinan Cabang Muhammadiyah (PCM) Depok berkomitmen dalam dakwah Islam berkemajuan, menggerakkan
                    pendidikan, sosial, dan pemberdayaan masyarakat untuk kesejahteraan umat.</p>
            </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
            <img src="{{ asset('Company/assets/img/hero-carousel/hero-carousel-2.jpg') }}" alt="">
            <div class="container">
                <h2>Pimpinan Cabang Muhammadiyah Depok</h2>
                <p>Pimpinan Cabang Muhammadiyah (PCM) Depok berperan aktif dalam membangun masyarakat yang berkemajuan,
                    mengedepankan nilai-nilai Islam dalam pendidikan, sosial, dan dakwah. Dengan semangat kebersamaan,
                    PCM Depok terus berupaya menghadirkan solusi dan kontribusi nyata bagi umat demi mewujudkan
                    kesejahteraan dan keadilan sosial.</p>
            </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
            <img src="{{ asset('Company/assets/img/hero-carousel/hero-carousel-3.jpg') }}" alt="">
            <div class="container">
                <h2>Temporibus autem quibusdam</h2>
                <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                    aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste
                    natus error sit voluptatem accusantium.</p>
                <a href="about.html" class="btn-get-started">Read More</a>
            </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

    </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

    <div class="container">

        <div class="row position-relative">

            <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200"><img
                    src="{{ asset('Company/assets/img/about.jpg') }}"></div>

            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <h2 class="inner-title">Pimpinan Cabang Muhammadiyah Depok</h2>
                <div class="our-story">
                    <p>Sejak berdiri, Muhammadiyah Depok terus berkomitmen untuk membangun masyarakat yang berkemajuan,
                        berlandaskan nilai-nilai Islam yang rahmatan lil ‘alamin. Dengan semangat dakwah dan pendidikan,
                        kami berusaha menghadirkan solusi nyata bagi umat dan bangsa.</p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Membangun generasi unggul dan berakhlak
                                mulia</span>
                        </li>
                        <li><i class="bi bi-check-circle"></i> <span>Mengembangkan pendidikan berbasis Islam dan
                                teknologi</span>
                        </li>
                        <li><i class="bi bi-check-circle"></i> <span>Mewujudkan kesejahteraan sosial melalui gerakan
                                filantropi</span></li>
                    </ul>
                    <p>Kami percaya bahwa perubahan dimulai dari langkah kecil yang dilakukan dengan penuh keikhlasan
                        dan kesungguhan. Mari bersama membangun Depok yang lebih baik melalui semangat persyarikatan dan
                        gotong royong.</p>

                    <div class="watch-video d-flex align-items-center position-relative">
                        <i class="bi bi-play-circle"></i>
                        <a href="https://www.youtube.com/watch?v=UnOuI5kht2k&ab_channel=arifranu"
                            class="glightbox stretched-link">Video profil</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section><!-- /About Section -->

<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">

    <div class="container">
        <div class="row gy-4">
            <div class="section-title text-center mb-4">
                <h2>kegiatan terbaru kami</h2>
                <p>kami melakukan banyak kegiatan selengkapnya pada halaman kegiatan.</p>
            </div>
            @foreach ( $kegiatans as $blog )

            <div class="col-lg-4">
                <article class="position-relative h-100">
                    <div class="post-img position-relative overflow-hidden" style="height: 250px;">
                        <img src="{{ $blog->getFirstMediaUrl(Kegiatan::MEDIA_COLLECTION) ?: asset('default.png') }}"
                            class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $blog->title }}">
                        <span
                            class="post-date position-absolute bottom-0 end-0 bg-success text-white px-2 py-1 small">{{
                            $blog->tanggal }}</span>
                    </div>


                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title">{{ $blog->nama_kegiatan}}</h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person"></i> <span class="ps-2">John Doe</span>
                            </div>
                            <span class="px-3 text-black-50">/</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                            </div>
                        </div>

                        <p>
                            {{ Str::limit($blog->deskripsi, 120, '...') }}
                        </p>

                        <hr>

                        <a href="blog-details.html" class="readmore stretched-link"><span>Selengkapnya</span><i
                                class="bi bi-arrow-right"></i></a>

                    </div>

                </article>
            </div><!-- End post list item -->

            @endforeach

        </div>
        <div class="d-flex justify-content-center mt-4">
            {{-- {{ $blogs->links() }} --}}
        </div>
    </div>

</section><!-- /Blog Posts Section -->

@endsection