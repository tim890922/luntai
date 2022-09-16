@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')



    {{-- @if ($errors->any())
        <ul>

            @foreach ($errors->all() as $error)
                <li class="bg-red-400 ">{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}

    <div class="w-auto bg-gray-400">
        <div class="p-4 ">
            <form action="{{ $action }}" method="POST">
                @csrf
                @isset($method)
                    @method($method)
                @endisset
                <table class="mx-auto text-xl">
                    @isset($body)
                        @foreach ($body as $index => $row)
                            <tr>
                                @isset($row['lable'])
                                    <td class="text-right ">{{ $row['lable'] }}</td>
                                @endisset
                                <td class="px-3 py-2">
                                    @switch($row['tag'])
                                        @case('input')
                                            @include('component.input', $row)
                                            @if ($errors->has($row['name']))
                                                <p style="color:red">請填寫此項目</p>
                                            @endif
                                        @break
                                    @endswitch

                                </td>
                            </tr>
                        @endforeach
                    @endisset

                </table>
                <div class="flex w-1/2 mx-auto my-3 center">
                    <Button type="submit" class="px-3 m-auto bg-gray-300 rounded hover:bg-gray-500">送出</Button>
                    <button type="reset" class="px-3 m-auto bg-red-300 rounded hover:bg-red-500">重置</button>
                </div>
            </form>
        </div>
    </div>
@endsection
