<input type="{{ $type }}" class="px-3 border border-black border-solid rounded bg-white-100 focus:bg-white" name="{{ $name }}"  value="@isset($value)
{{ $value }}@endisset{{ old($name) }}"  
    
  @isset($step)
step="{{ $step }}"
@endisset
@isset($required)
required="{{ $required }}"
@endisset
@if ($type=='number')
  min="0"
@endif>