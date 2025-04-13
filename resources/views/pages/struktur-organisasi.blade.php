@extends('layouts.app')

@section('title', 'SIPIMDepok')

@section('content')

@include('components.page-title', ['title' => 'Struktur Organisasi', 'current' => 'Struktur Organisasi'])
@include('components.organization-structure')

@endsection