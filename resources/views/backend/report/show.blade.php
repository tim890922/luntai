@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            {{ $header }}</h1>
    </div>
    <div class="h-auto px-3 py-3 mt-3 bg-gray-400 border border-gray-400 rounded-auto ">
        <div class="p-10 ">
            @isset($body)
                <div>
                    <table class="mx-auto text-xl">
                        @foreach ($body as $item)
                            <tr></tr>
                                <td class="text-right"> {{ $item['lable'] }} : </td>
                                <td>{{ $item['text'] }} </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endisset
        </div>
    </div>
@endsection
