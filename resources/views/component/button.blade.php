<button class="{{ $class }} {{ $action }}" type="{{ $type }}" @isset($name)
    name="{{ $name }}"
@endisset  data-id="{{ $id }}">{{ $text }}</button>