@extends('layouts.app')

@section('title', 'SIPIMDepok')

@section('content')

{{-- @include('components.page-title', ['title' => 'Halaman Utama', 'current' => 'Halaman Utama']) --}}
@include('components.index-section')
@include('components.support-section')
@include('components.sipim-section')

@include('components.blog-post-section-index')

@endsection