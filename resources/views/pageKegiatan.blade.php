@extends('layouts.app')

@section('title', $kegiatan->nama_kegiatan)

@section('content')
@php
use App\Models\Kegiatan;
@endphp

<!-- Page Title -->
<div class="page-title accent-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">{{ $kegiatan->nama_kegiatan }}</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Halaman Utama</a></li>
                <li><a href="{{ route('kegiatan') }}">Kegiatan</a></li>
                <li class="current">{{ $kegiatan->nama_kegiatan }}</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Kegiatan Detail -->
<section class="kegiatan-detail section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <img src="{{ $kegiatan->getFirstMediaUrl(Kegiatan::MEDIA_COLLECTION) ?: asset('default.png') }}"
                        class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $kegiatan->title }}">
                    <div class="card-body">
                        <h3 class="card-title">{{ $kegiatan->nama_kegiatan }}</h3>
                        <p class="card-text">{{ $kegiatan->deskripsi }}</p>
                        <p><strong>Tanggal:</strong> {{ $kegiatan->tanggal }}</p>
                        <p><strong>Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card p-3">
                    <h5>Informasi Lainnya</h5>
                    <p><strong>Penyelenggara:</strong> Pimpinan Cabang Muhammadiyah Depok</p>
                    <p><strong>Anggota yang ikut:</strong>
                        @foreach($kegiatan->anggota as $anggota)
                        {{ $anggota->nama }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </p>

                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('kegiatan') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</section>

@endsection