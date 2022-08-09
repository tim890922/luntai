<input type="{{ $type }}" class="bg-blue-100 border-b-2 rounded-full focus:bg-white" name="{{ $name }}" @isset($value) value="{{ $value }}"  @endisset @isset($step)
step="{{ $step }}"
@endisset>