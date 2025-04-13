@extends('layouts.app')

@section('title', 'SIPIMDepok')

@section('content')
@include('components.page-title', ['title' => 'Tentang Kami', 'current' => 'Tentang Kami'])
{{-- @include('components.about-section') --}}
@include('components.visi-misi-section')
{{-- @include('components.member-table-about') --}}

@endsection