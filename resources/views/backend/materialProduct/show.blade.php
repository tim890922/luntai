@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            {{ $header }}的物料清單</h1>
    </div>


    <div class=" w-auto h-auto px-3 py-3 mt-3 border border-gray-400 bg-gray-300 ">
        <ul class=" m-auto">
            <p class="my-2 text-xl font-bold accordion">
                {{ $header }}</p>
            <ul class=" pl-5 text-xl font-thin block">
                {{-- for 二階料號 --}}
                @foreach ($content as $c)
                    @foreach ($c as $item)
                        <li>
                            <div class=" hover:text-blue-600 accordion grid grid-cols-2 gap-1 w-2/3">
                                <div>
                                    {{ $item['material'] }}
                                </div>
                                <div>
                                    {{ $item['quantity'].$item['unit'] }}
                                </div>
                            </div>
                            {{-- next is set for --}}
                            <ul class=" pl-5 text-xl font-thin block">
                                <li>
                                    <p class="block hover:text-blue-600 accordion">三階</p>
                                    {{-- next is set for --}}
                                    <ul class=" pl-5 text-xl font-thin block">
                                        <li>
                                            <p class="block hover:text-blue-600 accordion">四階</p>
                                            {{-- next is set for  --}}
                                            <ul class=" pl-5 text-xl font-thin block">
                                                <li>
                                                    <p class="block hover:text-blue-600 accordion">五階</p>
                                                </li>
                                            </ul>
                                            {{-- end for --}}
                                        </li>
                                    </ul>
                                    {{-- end for --}}
                                </li>
                            </ul>
                            {{-- end for --}}
                        </li>
                        {{-- end for --}}
                    @endforeach
                @endforeach

            </ul>



        </ul>


    </div>
@endsection
