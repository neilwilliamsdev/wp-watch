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

    <div class="mt-8">
    <form method="POST" action="{{ route('sites.destroy', $site) }}">
        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700"
        >
            Delete site
        </button>
    </form>
</div>
<div class="mt-4">
    <a href="{{ route('sites.edit', $site) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Edit site</a>
</div>
@endsection