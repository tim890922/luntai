<select name="{{$name}}" @isset($required)
    required="required"
@endisset class="p-1 border border-black rounded" @isset($data_attr)
data-id="{{ $data_attr }}"
    
@endisset>
    @foreach ($lists as $list)
        <option value ="{{ $list['value'] }}" @isset($list['selected'])
            {{ $list['selected'] }}
        @endisset>
            {{ $list['text'] }}
        </option> 
    @endforeach ()

</select>
