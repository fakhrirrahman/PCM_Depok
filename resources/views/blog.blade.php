@extends('layouts.app')

@section('title', 'Our Services')

@section('content')

@php
use App\Models\Kegiatan;
@endphp

<!-- Page Title -->
<div class="page-title accent-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Blog</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Blog</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">

  <div class="container">
    <div class="row gy-4">
      @foreach ( $kegiatans as $blog )

      <div class="col-lg-4">
        <article class="position-relative h-100">
          <div class="post-img position-relative overflow-hidden" style="height: 250px;">
            <img src="{{ $blog->getFirstMediaUrl(Kegiatan::MEDIA_COLLECTION) ?: asset('default.png') }}"
              class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $blog->title }}">
            <span class="post-date position-absolute bottom-0 end-0 bg-success text-white px-2 py-1 small">{{
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

            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
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

<!-- Blog Pagination Section -->
<section id="blog-pagination" class="blog-pagination section">

  <div class="container">
    <div class="d-flex justify-content-center">
      <ul>
        <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
        <li><a href="#" class="active">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li>...</li>
        <li><a href="#">10</a></li>
        <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </div>
  </div>

</section><!-- /Blog Pagination Section -->

@endsection