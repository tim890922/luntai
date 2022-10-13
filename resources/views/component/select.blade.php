<select name="{{$name}}" @isset($required)
    required="required"
@endisset class="p-1 border border-black rounded">
    @foreach ($lists as $list)
        <option value =" {{ $list['value'] }} " @isset($list['selected'])
            {{ $list['selected'] }}
        @endisset>
            {{ $list['text'] }}
        </option> 
    @endforeach ()

</select>
