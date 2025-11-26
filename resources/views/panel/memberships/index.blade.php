@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Memberships</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('panel.memberships.create') }}">Create membership</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Duration (days)</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($memberships as $membership)
            <tr>
                <td>{{ $membership->id }}</td>
                <td>{{ $membership->name }}</td>
                <td>{{ $membership->price }}</td>
                <td>{{ $membership->duration_days }}</td>
                <td>{{ $membership->is_active ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('panel.memberships.edit', $membership) }}">Edit</a>
                    <form action="{{ route('panel.memberships.destroy', $membership) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deactivate</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $memberships->links() }}
</div>
@endsection
