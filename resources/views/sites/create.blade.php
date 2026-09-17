@extends('layouts.app')

@section('title', 'Add Site')

@section('content')

    <div class="max-w-xl mx-auto">
    <h1 class="text-3xl font-bold text-slate-900 mb-8">Add site</h1>

    <form method="POST" action="/sites"
          class="space-y-6 bg-white border border-slate-200 rounded-xl p-8 shadow-sm">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-slate-700 mb-2">
                Name
            </label>

            <input
                id="name"
                type="text"
                name="name"
                class="w-full rounded-lg border border-slate-300 px-4 py-3
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            >
        </div>

        <div>
            <label for="url" class="block text-sm font-medium text-slate-700 mb-2">
                URL
            </label>

            <input
                id="url"
                type="url"
                name="url"
                class="w-full rounded-lg border border-slate-300 px-4 py-3
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            >
        </div>

        <div>
            <label for="php_version" class="block text-sm font-medium text-slate-700 mb-2">
                PHP version
            </label>

            <input
                id="php_version"
                type="text"
                name="php_version"
                class="w-full rounded-lg border border-slate-300 px-4 py-3
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            >
        </div>

        <div>
            <label for="wp_version" class="block text-sm font-medium text-slate-700 mb-2">
                WordPress version
            </label>

            <input
                id="wp_version"
                type="text"
                name="wp_version"
                class="w-full rounded-lg border border-slate-300 px-4 py-3
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            >
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-slate-700 mb-2">
                Status
            </label>

            <input
                id="status"
                type="text"
                name="status"
                class="w-full rounded-lg border border-slate-300 px-4 py-3
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            >
        </div>

        <div class="pt-2">
            <button
                type="submit"
                class="px-5 py-3 bg-blue-600 text-white font-medium rounded-lg
                       hover:bg-blue-700 transition"
            >
                Add site
            </button>
        </div>
    </form>
</div>

@endsection