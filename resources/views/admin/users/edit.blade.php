@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit user</h1>

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}">
            @error('name') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}">
            @error('email') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>New password (optional)</label>
            <input type="password" name="password">
            @error('password') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Role</label>
            <select name="role_id">
                @foreach($roles as $role)
                <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>
                    {{ $role->display_name ?? $role->name }}
                </option>
                @endforeach
            </select>
            @error('role_id') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Active</label>
            <select name="is_active">
                <option value="1" @if($user->is_active) selected @endif>Yes</option>
                <option value="0" @if(!$user->is_active) selected @endif>No</option>
            </select>
            @error('is_active') <div>{{ $message }}</div> @enderror
        </div>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
