@props(['type' => 'success'])

@php
    $color = $type === 'success' ? 'green' : 'red';
@endphp
 
@if (session($type))
    <div class="mb-4 px-4 py-3 rounded bg-{{ $color }}-100 border-l-4 border-{{ $color }}-500 text-{{ $color }}-700">
        {{ session($type) }}
    </div>
@endif 