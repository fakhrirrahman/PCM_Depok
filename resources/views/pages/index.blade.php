@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')

@include('components.page-title', ['title' => 'Halaman Utama', 'current' => 'Halaman Utama'])
@include('components.about-section')
@include('components.blog-post-section-index')

@endsection