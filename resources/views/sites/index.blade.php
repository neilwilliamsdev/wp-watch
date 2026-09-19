@extends('layouts.app')

@section('title', 'Sites')

@section('content')

    <div class="max-w-5xl mx-auto p-6">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold">Sites</h1>

            <a
                href="/sites/create"
                class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-700"
            >
                Add site
            </a>
        </div>

        <div class="space-y-4">
            @foreach ($sites as $site)
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <h2 class="text-xl font-semibold">{{ $site->name }}</h2>

                    <p class="text-gray-500">{{ $site->url }}</p>

                    <div class="mt-4 flex gap-6 text-sm">
                        <span>PHP {{ $site->php_version }}</span>
                        <span>WordPress {{ $site->wp_version }}</span>
                        <span>{{ $site->status }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection