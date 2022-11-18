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


    <div class="w-auto h-auto px-3 py-3 mt-3 bg-gray-300 border border-gray-400 ">
        <ul class="m-auto ">

            <img src="{{ asset('img/createSvg.svg') }}" style="height: 22px" class="inline float-left pt-1 mx-3 insert"
                data-id="{{ $header }}">

            <p class="my-2 text-xl font-bold cursor-pointer accordion">
                {{ $header }}</p>
            <ul class="pl-10 text-xl font-thin " style="display:block">
                @foreach ($content as $c)
                    <li class="my-4 ">
                        <div class="grid w-2/3 grid-cols-2 gap-1 hover:text-blue-600 accordion">

                            <div class="cursor-pointer ">
                                <img src="{{ asset('img/createSvg.svg') }}" style="height: 22px"
                                    class="inline float-left pt-1 mx-3 insert" data-id="{{ $c['material'] }}">
                                <img src="{{ asset('img/delete.svg') }}" style="height: 22px"
                                    class="inline float-left pt-1 mx-3 delete" data-id="{{ $c['material'] }}">
                                {{ $c['material'] }}
                            </div>
                            <div class="cursor-pointer ">
                                {{ $c['quantity'] . $c['unit'] }}
                            </div>
                        </div>
                        @if ($c['next'] != [])
                            <ul class="pl-10 text-xl font-thin " style="display:block">
                                @foreach ($c['next'] as $next)
                                    <div class="grid w-2/3 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                        <div class="cursor-pointer ">
                                            <img src="{{ asset('img/createSvg.svg') }}" style="height: 22px"
                                                class="inline float-left pt-1 mx-3 insert" data-id="{{ $c['material'] }}">
                                            <img src="{{ asset('img/delete.svg') }}" style="height: 22px"
                                                class="inline float-left pt-1 mx-3 delete" data-id="{{ $c['material'] }}">
                                            {{ $next['material'] }}
                                        </div>
                                        <div class="cursor-pointer ml">
                                            {{ $next['quantity'] . $next['unit'] }}
                                        </div>
                                    </div>
                                    @if ($c['next'] != [])
                                        <ul class="pl-10 text-xl font-thin " style="display:block">
                                            @foreach ($next['next'] as $next)
                                                <div
                                                    class="grid w-2/3 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                                    <div class="cursor-pointer ">
                                                        <img src="{{ asset('img/createSvg.svg') }}" style="height: 22px"
                                                            class="inline float-left pt-1 mx-3 insert"
                                                            data-id="{{ $c['material'] }}">
                                                        <img src="{{ asset('img/delete.svg') }}" style="height: 22px"
                                                            class="inline float-left pt-1 mx-3 delete"
                                                            data-id="{{ $c['material'] }}">{{ $next['material'] }}
                                                    </div>
                                                    <div class="cursor-pointer ">
                                                        {{ $next['quantity'] . $next['unit'] }}
                                                    </div>
                                                </div>
                                                @if ($c['next'] != [])
                                                    <ul class="pl-10 text-xl font-thin " style="display:block">
                                                        @foreach ($next['next'] as $next)
                                                            <div
                                                                class="grid w-2/3 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                                                <div class="cursor-pointer ">
                                                                    <img src="{{ asset('img/createSvg.svg') }}"
                                                                        style="height: 22px"
                                                                        class="inline float-left pt-1 mx-3 insert"
                                                                        data-id="{{ $c['material'] }}">
                                                                    <img src="{{ asset('img/delete.svg') }}"
                                                                        style="height: 22px"
                                                                        class="inline float-left pt-1 mx-3 delete"
                                                                        data-id="{{ $c['material'] }}">
                                                                    {{ $next['material'] }}
                                                                </div>
                                                                <div class="cursor-pointer ">
                                                                    {{ $next['quantity'] . $next['unit'] }}
                                                                </div>
                                                            </div>
                                                            @if ($c['next'] != [])
                                                                <ul class="pl-10 text-xl font-thin " style="display:block">
                                                                    @foreach ($next['next'] as $next)
                                                                        <div
                                                                            class="grid w-2/3 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                                                            <div class="cursor-pointer ">
                                                                                <img src="{{ asset('img/createSvg.svg') }}"
                                                                                    style="height: 22px"
                                                                                    class="inline float-left pt-1 mx-3 insert"
                                                                                    data-id="{{ $c['material'] }}">
                                                                                <img src="{{ asset('img/delete.svg') }}"
                                                                                    style="height: 22px"
                                                                                    class="inline float-left pt-1 mx-3 delete"
                                                                                    data-id="{{ $c['material'] }}">
                                                                                {{ $next['material'] }}
                                                                            </div>
                                                                            <div class="cursor-pointer ">
                                                                                {{ $next['quantity'] . $next['unit'] }}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    {{-- @endforeach --}}
                @endforeach

            </ul>



        </ul>


    </div>
@endsection
@section('script')
    <script>
        $(".insert").on("click", function() {
            console.log("insert")
        })
    </script>
@endsection
