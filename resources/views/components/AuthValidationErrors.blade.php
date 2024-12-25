@props(['errors'])

@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'mb-4 font-medium text-sm text-red-600']) }}>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
