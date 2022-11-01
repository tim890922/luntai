@extends('layout.app')
@section('side')
    @include('component.side')
@endsection



@section('main')
    <div class="mx-auto ">
        <h1 class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">訂單資料</h1>
    </div>
    <div class="flex items-center justify-around">

        @foreach ($clients as $client  )
        <a href="order/">
           <div class="flex items-center justify-center w-56 h-56 p-12 mx-12 my-12 text-2xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500"
            style="">
             {{ $client->client_name }}
            </div> 
        </a>
        @endforeach
        
        {{-- <div class="flex items-center justify-center w-56 h-56 p-12 mx-12 my-12 text-2xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500"
            style="">
            <p>GOGORO</p>
        </div>
        <div class="flex items-center justify-center w-56 h-56 p-12 mx-12 my-12 text-2xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500"
            style="">
            <p>SYM</p>
        </div> --}}
    </div>
@endsection
