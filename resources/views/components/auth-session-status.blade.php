{{-- resources/views/components/auth-session-status.blade.php --}}
@props(['status'])

@if ($status)
    <div {{ $attributes->merge([
        'class' =>
            'mb-4 px-4 py-3 text-sm rounded-md border
             bg-emerald-500/10 border-emerald-500/40 text-emerald-300'
    ]) }}>
        {{ $status }}
    </div>
@endif
