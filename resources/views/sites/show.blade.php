@extends('layouts.app')

@section('title', 'View Site')

@section('content')
    <h1 class="text-3xl font-bold text-slate-900 mb-8">View Site</h1>

    <div class="max-w-xl mx-auto">
        <p><strong>Name:</strong> {{ $site->name }}</p>
        <p><strong>URL:</strong> <a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></p>
        <p><strong>PHP Version:</strong> {{ $wordpress['php_version'] }}</p>
        <p><strong>WordPress Version:</strong> {{ $wordpress['wordpress_version'] }}</p>
        <div class="flex items-center gap-2">
            <p><strong>Status:</strong></p> 
            <span
                class="inline-block h-3 w-3 rounded-full {{ $site->is_available ? 'bg-green-500' : 'bg-red-500' }}"
            ></span>

            <span class="text-sm">
                {{ $site->is_available ? 'Online' : 'Offline' }}
            </span>
        </div>
    </div>
    <h2 class="mt-8 text-xl font-semibold">Plugin updates</h2>

    @if (empty($wordpress['plugin_updates']))
        <p class="mt-2 text-slate-600">All plugins are up to date.</p>
    @else
        <div class="mt-4 overflow-hidden rounded-lg bg-white shadow">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Plugin</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Installed</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Available</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach ($wordpress['plugin_updates'] as $plugin)
                        <tr>
                            <td class="px-4 py-3">{{ $plugin['name'] }}</td>
                            <td class="px-4 py-3">{{ $plugin['installed_version'] }}</td>
                            <td class="px-4 py-3">{{ $plugin['available_version'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

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