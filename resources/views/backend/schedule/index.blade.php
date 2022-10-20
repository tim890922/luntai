@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            排程系統</h1>
    </div>
    {{-- 訊息區 --}}
    @if (session()->has('notice'))
        <div class="px-3 mt-3 text-xl bg-green-400 rounded alert alert-success">
            {{ session('notice') }}
        </div>
    @endif
    <div class="w-auto h-auto px-3 py-3 mt-3 border border-gray-400">
        <div class=" border bg-gray-300 my-3 border-black px-2 py-2 ">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi quam explicabo numquam hic vel impedit recusandae eligendi mollitia, ipsa provident ducimus quisquam amet odit non dolore, quas, iure maiores possimus!
        </div>
        <div class=" border bg-gray-300 my-3 border-black px-2 py-2 ">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi quam explicabo numquam hic vel impedit recusandae eligendi mollitia, ipsa provident ducimus quisquam amet odit non dolore, quas, iure maiores possimus!
        </div>
        <div class=" border bg-gray-300 my-3 border-black px-2 py-2 ">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi quam explicabo numquam hic vel impedit recusandae eligendi mollitia, ipsa provident ducimus quisquam amet odit non dolore, quas, iure maiores possimus!
        </div>
        
    </div>
@endsection
