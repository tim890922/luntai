<input type="{{ $type }}" class="px-3 bg-blue-100 border-b-2 rounded-full focus:bg-white" name="{{ $name }}"  value="@isset($value)
{{ $value }}@endisset{{ old($name) }}"  
    
  @isset($step)
step="{{ $step }}"
@endisset>