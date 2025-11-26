@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit membership</h1>

    <form method="POST" action="{{ route('panel.memberships.update', $membership) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $membership->name) }}">
            @error('name') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $membership->price) }}">
            @error('price') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Duration (days)</label>
            <input type="number" name="duration_days" value="{{ old('duration_days', $membership->duration_days) }}">
            @error('duration_days') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Active</label>
            <select name="is_active">
                <option value="1" @if($membership->is_active) selected @endif>Yes</option>
                <option value="0" @if(!$membership->is_active) selected @endif>No</option>
            </select>
            @error('is_active') <div>{{ $message }}</div> @enderror
        </div>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
