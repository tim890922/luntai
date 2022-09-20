<select name="{{ $name }}" @isset($required)
    required="required"
@endisset class="p-2 border border-black rounded">
    @foreach ($value as $v)
        
            <option value=" {{ $v }} ">
                {{ $v }}
            </option>
        
    @endforeach ()

</select>
