@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>User Details</h2>
        <div>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Age:</strong> {{ $user->age }}</p>
        </div>
    </div>
    
@endsection