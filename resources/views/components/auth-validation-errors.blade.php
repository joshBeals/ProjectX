@props(['errors'])

@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        <ul class="mt-3 alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

