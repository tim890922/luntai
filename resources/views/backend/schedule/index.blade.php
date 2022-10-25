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
           機台編號：1
           <button>新增一列</button>
           <form action="">

            <label for="">訂單批號：</label>
            <select name="" id=""  class=" mr-4">訂單批號</select>

            <label for="">內容：</label>
            <select name="" id="" class=" mr-4"></select>

            <label for="">生產時間</label>
            <input type="time">
            -
            <input type="time">

            <label for="" class="mr-4">料號：123</label>

            <label for="" class="mr-4">計畫數量：</label>

            <label for="">預計產量：</label>
            <input type="number" step="1" class="mr-4">

           </form>
           <div class=" border border-gray-200 mt-5">
            產品資訊
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores tempora, totam dolore quos obcaecati aliquid id a in pariatur reiciendis labore nemo nisi minima rerum eligendi neque repellendus fugit at.
           </div>
        </div>
        <div class=" border bg-gray-300 my-3 border-black px-2 py-2 ">
            機台二區塊
        </div>
        <div class=" border bg-gray-300 my-3 border-black px-2 py-2 ">
            機台三區塊
        </div>
        
    </div>
@endsection
