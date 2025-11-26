@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create membership</h1>

    <form method="POST" action="{{ route('panel.memberships.store') }}">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}">
            @error('price') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Duration (days)</label>
            <input type="number" name="duration_days" value="{{ old('duration_days') }}">
            @error('duration_days') <div>{{ $message }}</div> @enderror
        </div>

        <button type="submit">Save</button>
    </form>
</div>
@endsection
