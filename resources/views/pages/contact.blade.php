@extends('layouts.app')

@section('title', 'SIPIMDepok')

@section('content')

@include('components.page-title', ['title' => 'Kontak', 'current' => 'Kontak'])

@include('components.contact-section')

@endsection