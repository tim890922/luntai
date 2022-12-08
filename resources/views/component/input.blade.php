@if ($type != 'hidden')
    <input type="{{ $type }}"
        class="px-3 border border-black border-solid rounded bg-white-100 focus:bg-white @isset($class)
  {{ $class }}
@endisset"
        name="{{ $name }}"
        value="@isset($value)
{{ $value }}@endisset{{ old($name) }}"
        @isset($step)
step="{{ $step }}"
@endisset
        @isset($required)
required="{{ $required }}"
@endisset
        @if ($type == 'number') min="0" @endif
        @isset($readonly)
  readonly="true"
@endisset>
@else
    <input type="{{ $type }}" name="{{ $name }}"
        value="@isset($value)
{{ $value }}@endisset{{ old($name) }}"
        @isset($step)
step="{{ $step }}"
@endisset
        @isset($required)
required="{{ $required }}"
@endisset
        @if ($type == 'number') min="0" @endif
        @isset($readonly)
  readonly="true"
@endisset class=" m-0 p-0">
@endif
