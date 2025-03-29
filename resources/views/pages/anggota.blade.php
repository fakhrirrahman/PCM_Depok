@extends('layouts.app')

@section('title', 'Anggota')

@section('content')
@include('components.page-title', ['title' => 'Anggota', 'current' => 'Anggota'])
@include('components.member-table')


@endsection