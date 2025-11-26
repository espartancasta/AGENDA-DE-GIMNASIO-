@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create user</h1>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password">
            @error('password') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Role</label>
            <select name="role_id">
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->display_name ?? $role->name }}</option>
                @endforeach
            </select>
            @error('role_id') <div>{{ $message }}</div> @enderror
        </div>

        <button type="submit">Save</button>
    </form>
</div>
@endsection
