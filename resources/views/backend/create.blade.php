@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="w-auto bg-gray-400">
        <div class="p-4 ">
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
        </div>
    </div>
@endsection
