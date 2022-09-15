

<table id="table_1" class="my-4 hover">
    @csrf
    <thead>
        <tr>
            @foreach ($col as $c)
                <td>{{ $c }}</td>
            @endforeach
        </tr>
    </thead>
    <tbody>

        @foreach ($row as $r)
            <tr>
                @foreach ($r as $item)
                    <td>
                        @switch($item['tag'])
                            @case('button')
                              
                                @include('component.button', $item)
                            @break
                            @case('href')
                                @include('component.href',$item)
                            @break
                            @case('')
                                {{ $item['text'] }}
                            @break
                                
                        @endswitch
                    </td>
                @endforeach
            </tr>
        @endforeach

    </tbody>
</table>
