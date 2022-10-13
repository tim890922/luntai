@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('style')
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            {{ $header }}</h1>
    </div>

    <div class="w-auto h-auto px-3 py-3 mt-3 border border-gray-400">

        <h2 class=" mb-3 text-3xl pl-3">製程資料</h2>
        {{-- button按鈕 --}}
        <div class="tab " id="tab-list">
            @for ($i = 0; $i < count($contents); $i++)
                <button class="tablinks" onclick="openCity(event, '{{ $i + 1 }}')">
                    {{ $button[$i] }}
                </button>
            @endfor
            <button id="myBtn" class="tablinks" style="float:right">新增製程</button>

        </div>
        @for ($i = 0; $i < count($contents); $i++)
            <div id="{{ $i + 1 }}" class="tabcontent">

                @foreach ($contents[$i] as $item)
                    <div class=" mb-2 border border-gray-300">
                        <p class="font-bold">工作站名稱：{{ $item['name'] }}</p>
                        <p class="font-bold">週期時間：{{ $item['ct'] }}</p>
                        <p class="font-bold">日班需求人數：{{ $item['morning_employee'] }}</p>
                        <p class="font-bold">夜班需求人數：{{ $item['night_employee'] }}</p>
                        <p class="font-bold">不良率：{{ $item['non_performing_rate'] * 100 . '%' }}</p>
                        <a href="" class=" bg-blue-300 hover:bg-blue-500 rounded ml-1 px-1 my-3">編輯</a>
                        <a href="" class=" bg-red-300 hover:bg-red-500 rounded ml-1 px-1 my-3">刪除</a>
                    </div>
                @endforeach
                <a href="" class=" bg-green-300 hover:bg-green-500 rounded px-1">
                    新增工作站
                </a>

            </div>
        @endfor



    </div>

    <!-- The Modal -->
    @include('component.modal')
@endsection
@section('script')
@endsection
