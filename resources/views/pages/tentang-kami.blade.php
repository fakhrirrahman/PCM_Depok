@extends('layouts.app')

@section('title', 'SIPIMDepok')

@section('content')
@include('components.page-title', ['title' => 'Tentang Kami', 'current' => 'Tentang Kami'])
@include('components.visi-misi-section')

@endsection