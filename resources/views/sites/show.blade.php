@extends('layouts.app')

@section('title', 'View Site')

@section('content')
    <h1 class="text-3xl font-bold text-slate-900 mb-8">View Site</h1>

    <div class="max-w-xl mx-auto">
        <p><strong>Name:</strong> {{ $site->name }}</p>
        <p><strong>URL:</strong> <a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></p>
        <p><strong>PHP Version:</strong> {{ $site->php_version }}</p>
        <p><strong>WordPress Version:</strong> {{ $site->wp_version }}</p>
        <p><strong>Status:</strong> {{ $site->status }}</p>
    </div>
@endsection