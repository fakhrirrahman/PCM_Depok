@extends('layouts.app')

@section('title', 'Presensi')

@section('content')

<!-- Page Title -->
<div class="page-title accent-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Presensi</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="current">Presensi</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 border-0"
        style="max-width: 500px; width: 100%; border-radius: 15px; background: linear-gradient(135deg, #ffffff, #f8f9fa);">
        <h2 class="text-center mb-4 text-primary fw-bold">Absensi Harian</h2>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ route('attendance.store') }}" method="POST" enctype="multipart/form-data"
            class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama:</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="Masukkan nama">
                <div class="invalid-feedback">Nama wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label fw-semibold">Ambil Foto:</label>
                <div class="input-group">
                    <input type="file" name="photo" id="photo" class="form-control" required accept="image/*"
                        capture="camera">
                    <button class="btn btn-outline-secondary" type="button" id="capture-btn">
                        <i class="fas fa-camera"></i>
                    </button>
                </div>
                <div class="invalid-feedback">Silakan unggah foto.</div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg fw-bold">Submit Absensi</button>
            </div>
        </form>
    </div>
</div>

<style>
    body {
        background-color: #f4f6f9;
    }

    .card {
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.15);
        border: none;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn-outline-secondary {
        border-color: #ced4da;
    }

    .btn-outline-secondary:hover {
        background-color: #e9ecef;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .alert {
        border-radius: 10px;
    }
</style>

<script>
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

        // Capture button functionality
        document.getElementById('capture-btn').addEventListener('click', function () {
            document.getElementById('photo').click();
        });
    })();
</script>
@endsection