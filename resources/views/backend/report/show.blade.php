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
        <div class="float-left float">
            <button class="px-5 m-auto text-xl bg-blue-300 rounded hover:bg-blue-500" onclick="history.back()">
                回上一頁
            </button>
        </div>
        <div class="p-10 ">

            <div>
                @isset($body)
                    <table class="mx-auto text-xl">
                        @foreach ($body as $item)
                            <tr>
                                <td class="text-right"> {{ $item['lable'] }} : </td>
                                <td>{{ $item['text'] }} </td>
                            </tr>
                        @endforeach

                    </table>
                @endisset
                <table
                    class="w-1/2 mx-auto mt-4 text-center whitespace-no-wrap border border-collapse table-auto border-slate-400">
                    <thead>
                        <tr>
                            @foreach ($table['th'] as $item)
                                <th
                                    class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-300 border rounded-tl rounded-bl title-font border-slate-300 border-gray-600">
                                    {{ $item['lable'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($table['tb'] as $tb)
                            <tr class=" border border-gray-600">
                                <td class=" border border-gray-600">{{ $tb['reason'] }}</td>
                                <td class=" border border-gray-600">{{ $tb['quantity'] }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
