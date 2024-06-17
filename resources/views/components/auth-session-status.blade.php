@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        <div class="mt-3 alert alert-success">
            {{ $status }}
        </div>
    </div>
@endif
