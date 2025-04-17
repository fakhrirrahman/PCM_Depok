@extends('layouts.app')

@section('title', 'SIPIMDepok')

@section('content')
@include('components.page-title', ['title' => 'Galeri', 'current' => 'Galeri'])
@include('components.img-section')


@endsection