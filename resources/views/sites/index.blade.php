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
                    <a href="/sites/{{ $site->id }}" class="text-xl font-semibold text-blue-600 hover:underline">
                        {{ $site->name }}
                    </a>

                    <p class="text-gray-500">{{ $site->url }}</p>

                    <div class="mt-4 flex items-center gap-6 text-sm core-info">
                        <span class="flex items-center gap-2"><img class="max-w-10" src="{{ asset('images/php.svg') }}" alt="PHP"> <b>{{ $site->wordpress['php_version'] }}</b></span>
                        <span class="flex items-center gap-2"><img class="max-w-10" src="{{ asset('images/wordpress.png') }}" alt="WordPress"> <b>{{ $site->wordpress['wordpress_version'] }}</b></span>
                        <div class="flex items-center gap-2">
                            <span
                                class="inline-block h-3 w-3 rounded-full {{ $site->is_available ? 'bg-green-500' : 'bg-red-500' }}"
                            ></span>

                            <span class="text-sm">
                                {{ $site->is_available ? 'Online' : 'Offline' }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection