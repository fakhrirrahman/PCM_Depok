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

<section id="visi-misi" class="py-5">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-4">
            <h2>Visi & Misi</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Visi</h3>
                <ul>
                    @php
                    $lastVisi = null;
                    @endphp

                    @foreach($visimisi as $vm)
                    @if(!empty($vm->visi))
                    @php $lastVisi = $vm->visi; @endphp
                    <li>{{ $lastVisi }}</li>
                    @endif
                    @endforeach
                </ul>
            </div>


            <div class="col-md-6">
                <h3>Misi</h3>
                <ul>
                    @php
                    $lastMisi = null;
                    @endphp

                    @foreach($visimisi as $vm)
                    @if(!empty($vm->misi))
                    @php $lastMisi = $vm->misi; @endphp
                    @endif

                    @if($lastMisi !== null)
                    <li>{{ $lastMisi }}</li>
                    @endif
                    @endforeach
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
                        <td>{{ $index + 1 }}</td>
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