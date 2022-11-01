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
            <p class="my-2 text-xl font-bold cursor-pointer accordion">
                {{ $header }}</p>
            <ul class="block pl-10 text-xl font-thin ">
                @foreach ($content as $c)
                    <li>
                        <div class="grid w-2/3 grid-cols-2 gap-1 hover:text-blue-600 accordion">
                            <div class="cursor-pointer ">
                                {{ $c['material'] }}
                            </div>
                            <div class="cursor-pointer ">
                                {{ $c['quantity'] . $c['unit'] }}
                            </div>
                        </div>
                        @if ($c['next'] != [])
                            <ul class="block pl-10 text-xl font-thin ">
                                @foreach ($c['next'] as $next)
                                    <div class="grid w-2/3 grid-cols-2 gap-1 hover:text-blue-600 accordion">
                                        <div class="cursor-pointer ">
                                            {{ $next['material'] }}
                                        </div>
                                        <div class="cursor-pointer ">
                                            {{ $next['quantity'] . $next['unit'] }}
                                        </div>
                                    </div>
                                    @if ($c['next'] != [])
                                        <ul class="block pl-10 text-xl font-thin ">
                                            @foreach ($next['next'] as $next)
                                                <div class="grid w-2/3 grid-cols-2 gap-1 hover:text-blue-600 accordion">
                                                    <div class="cursor-pointer ">
                                                        {{ $next['material'] }}
                                                    </div>
                                                    <div class="cursor-pointer ">
                                                        {{ $next['quantity'] . $next['unit'] }}
                                                    </div>
                                                </div>
                                                @if ($c['next'] != [])
                                        <ul class="block pl-10 text-xl font-thin ">
                                            @foreach ($next['next'] as $next)
                                                <div class="grid w-2/3 grid-cols-2 gap-1 hover:text-blue-600 accordion">
                                                    <div class="cursor-pointer ">
                                                        {{ $next['material'] }}
                                                    </div>
                                                    <div class="cursor-pointer ">
                                                        {{ $next['quantity'] . $next['unit'] }}
                                                    </div>
                                                </div>
                                                @if ($c['next'] != [])
                                        <ul class="block pl-10 text-xl font-thin ">
                                            @foreach ($next['next'] as $next)
                                                <div class="grid w-2/3 grid-cols-2 gap-1 hover:text-blue-600 accordion">
                                                    <div class="cursor-pointer ">
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
    
</script>
@endsection
