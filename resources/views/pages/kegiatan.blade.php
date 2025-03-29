@extends('layouts.app')

@section('title', 'Kegiatan')

@section('content')

@include('components.page-title', ['title' => 'Kegiatan', 'current' => 'Kegiatan'])
@include('components.blog-section')

@endsection