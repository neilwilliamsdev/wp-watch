@extends('layouts.app')

@section('title', 'Sites')

@section('content')

    <h1>WP Watch Site</h1>

    @foreach ($sites as $site)
        <h2>{{ $site->name }}</h2>
        <p>{{ $site->url }}</p>
        <p>PHP {{ $site->php_version }}</p>
        <p>WordPress {{ $site->wp_version }}</p>
        <p>Status: {{ $site->status }}</p>
    @endforeach

@endsection