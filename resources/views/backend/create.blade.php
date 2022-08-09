@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="w-auto bg-gray-400">
        <div class="p-4 ">
            <form action="{{ $action }}" method="POST">
                @csrf
                <table class="mx-auto text-xl">
                    @isset($body)
                        @foreach ($body as $row)
                            <tr>
                                <td class="text-right ">{{ $row['lable'] }}</td>
                                <td class="px-3 py-2">
                                    @switch($row['tag'])
                                        @case('input')
                                            @include('component.input', $row)
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
