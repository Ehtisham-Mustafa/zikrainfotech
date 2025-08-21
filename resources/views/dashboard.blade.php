@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to {{ $tenant->name }}’s Dashboard</h1>
        <p>Domain: {{ $tenant->domain }}</p>
        <p>Database: {{ $tenant->database }}</p>
    </div>
@endsection
