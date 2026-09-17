@extends('layouts.app')

@section('title', 'Sites')

@section('content')

    <h1>Add Site</h1>

    <form method="POST" action="/sites">
        @csrf

        <label>
            Name
            <input type="text" name="name">
        </label>

        <label>
            URL
            <input type="url" name="url">
        </label>
        <label>
            PHP version
            <input type="text" name="php_version">
        </label>

        <label>
            WordPress version
            <input type="text" name="wp_version">
        </label>

        <label>
            Status
            <input type="text" name="status">
        </label>

        <button type="submit">Add Site</button>
    </form>

@endsection