@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')

@include('components.page-title', ['title' => 'Struktur Organisasi', 'current' => 'Struktur Organisasi'])
@include('components.organization-structure')

@endsection