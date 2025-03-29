@extends('layouts.app')

@section('title', $kegiatan->nama_kegiatan)

@section('content')

@include('components.page-title', ['title' => $kegiatan->nama_kegiatan, 'current' => 'Kegiatan'])
@include('components.detail-blog')

@endsection