@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<!-- Page Title -->
<div class="page-title accent-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Tentang Kami</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{route ('home')}}">Halaman Utama</a></li>
                <li class="current">Tentang Kami</li>
            </ol>
        </nav>
    </div>
</div>
<!-- End Page Title -->
<!-- About Section -->
<section id="about" class="about section">

    <div class="container">

        <div class="row position-relative">

            <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200"><img
                    src="Company/assets/img/about.jpg">
            </div>

            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <h2 class="inner-title">Consequatur eius et magnam</h2>
                <div class="our-story">
                    <h4>Est 1988</h4>
                    <h3>Our Story</h3>
                    <p>Inventore aliquam beatae at et id alias. Ipsa dolores amet consequuntur minima quia maxime autem.
                        Quidem id sed ratione. Tenetur provident autem in reiciendis rerum at dolor. Aliquam consectetur
                        laudantium temporibus dicta minus dolor.</p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commo</span>
                        </li>
                        <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in</span>
                        </li>
                        <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
                    </ul>
                    <p>Vitae autem velit excepturi fugit. Animi ad non. Eligendi et non nesciunt suscipit repellendus
                        porro in quo eveniet. Molestias in maxime doloremque.</p>

                    <div class="watch-video d-flex align-items-center position-relative">
                        <i class="bi bi-play-circle"></i>
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox stretched-link">Watch
                            Video</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section><!-- /About Section -->
<section id="visi-misi" class="py-5">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-4">
            <h2>Visi & Misi</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Visi</h3>
                <p>Mewujudkan organisasi yang inovatif, berdaya saing, dan berkontribusi positif bagi masyarakat.</p>
            </div>
            <div class="col-md-6">
                <h3>Misi</h3>
                <ul>
                    <li>Mengembangkan sumber daya manusia yang kompeten dan profesional.</li>
                    <li>Mendorong inovasi dan kreativitas dalam setiap aspek organisasi.</li>
                    <li>Membangun kerja sama yang kuat dengan berbagai pihak untuk mencapai tujuan bersama.</li>
                    <li>Meningkatkan kesejahteraan anggota melalui berbagai program dan kegiatan.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="team" class="team py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-4">
            <h2>Beberapa Anggota Pada PCM Depok</h2>
            <p>Kami mempunyai anggota yang banyak datanya bisa dilihat pada daftar anggota</p>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Profesi</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Tahun Pembuatan</th>
                        {{-- <th>NBM</th>
                        <th>NBM Depan</th> --}}
                        <th>Cabang</th>
                        {{-- <th>PDM</th>
                        <th>PWM</th> --}}
                        <th>Alamat</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Kelurahan</th>
                        <th>No HP</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota as $index => $member)
                    <tr>
                        <td>{{ $anggota->firstItem() + $index }}</td>
                        <td>{{ $member->nama }}</td>
                        <td>{{ $member->profesi }}</td>
                        <td>{{ $member->tempat_lahir }}</td>
                        <td>{{ $member->tanggal_lahir }}</td>
                        <td>{{ $member->tahun_pembuatan }}</td>
                        {{-- <td>{{ $member->nbm }}</td>
                        <td>{{ $member->nbm_depan }}</td> --}}
                        <td>{{ $member->cabang }}</td>
                        {{-- <td>{{ $member->pdm }}</td>
                        <td>{{ $member->pwm }}</td> --}}
                        <td>{{ $member->alamat }}</td>
                        <td>{{ $member->kabupaten_tinggal }}</td>
                        <td>{{ $member->provinsi_tinggal }}</td>
                        <td>{{ $member->kelurahan }}</td>
                        <td>{{ $member->no_hp }}</td>
                        <td>{{ $member->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Section Visi & Misi -->

@endsection