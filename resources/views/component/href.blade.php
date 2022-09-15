<a class="{{ $class }} {{ $action }}" type="{{ $type }}" @isset($name)
name="{{ $name }}"@endisset data-id="{{ $id }}" @isset($alertname) data-alertname="{{ $alertname }}"@endisset @isset($href) href= "{{ $href }}"
@endisset>{{ $text }}</a>