@extends('layouts.app')

@section('title', 'Edit Site')

@section('content')
    <h1 class="text-3xl font-bold text-slate-900 mb-8">Edit Site</h1>

    <div class="max-w-xl mx-auto">
        <form action="{{ route('sites.update', $site->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-slate-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $site->name }}" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-slate-700">URL</label>
                <input type="url" name="url" id="url" value="{{ $site->url }}" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="php_version" class="block text-sm font-medium text-slate-700">PHP Version</label>
                <input type="text" name="php_version" id="php_version" value="{{ $site->php_version }}" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="wp_version" class="block text-sm font-medium text-slate-700">WordPress Version</label>
                <input type="text" name="wp_version" id="wp_version" value="{{ $site->wp_version }}" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-slate-700">Status</label>
                <select name="status" id="status" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm">
                    <option value="up" {{ $site->status === 'up' ? 'selected' : '' }}>Up</option>
                    <option value="down" {{ $site->status === 'down' ? 'selected' : '' }}>Down</option>
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update Site</button>
            </div>
        </form>
    </div>
@endsection