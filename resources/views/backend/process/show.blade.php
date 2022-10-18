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
    @if (session()->has('notice'))
        <div class="px-3 mt-3 text-xl bg-green-400 rounded alert alert-success">
            {{ session('notice') }}
        </div>
    @endif

    <div class="w-auto h-auto px-3 py-3 mt-3 border border-gray-400">
        <div class=" flex ">
            <h2 class="pl-3 mb-3 text-3xl ">製程資料</h2>
            {{-- button按鈕 --}}
            <button onclick="history.back()" value="回到上一頁" class=" ml-5 ">回上一頁</button>
        </div>

        <div class="tab " id="tab-list">

            @for ($i = 0; $i < count($contents); $i++)
                <button class="tablinks" onclick="openCity(event, '{{ $i + 1 }}')">
                    {{ $button[$i] }}
                </button>
            @endfor
            <button id="{{ $process['btn'] }}" class="tablinks" style="float:right" onclick="modal()">新增製程</button>

        </div>
        @for ($i = 0; $i < count($contents); $i++)
            <div id="{{ $i + 1 }}" class="tabcontent">

                @foreach ($contents[$i] as $item)
                    <div class="mb-2 border border-gray-300 ">
                        <p class="font-bold">工作站名稱：{{ $item['name'] }}</p>
                        <p class="font-bold">週期時間：{{ $item['ct'] }}</p>
                        <p class="font-bold">日班需求人數：{{ $item['morning_employee'] }}</p>
                        <p class="font-bold">夜班需求人數：{{ $item['night_employee'] }}</p>
                        <p class="font-bold">不良率：{{ $item['non_performing_rate'] * 100 . '%' }}</p>
                        <a href="" class="px-1 my-3 ml-1 bg-blue-300 rounded hover:bg-blue-500"
                            id="edit-workstation">編輯</a>
                        <a href="" class="px-1 my-3 ml-1 bg-red-300 rounded hover:bg-red-500">刪除</a>
                    </div>
                @endforeach
                <div class=" flex justify-center items-center">
                    <form action="{{ route('processDelete', $delete[$i]['id']) }}" method="POST">
                        @method($delete['method'])
                        @csrf
                        @include('component.button', $delete[$i])
                    </form>


                    <button id="{{ $workstation[$i]['btn'] }}" class="px-1 bg-green-300 rounded hover:bg-green-500">
                        新增工作站
                    </button>
                    @include('component.modal', $workstation[$i])
                </div>


            </div>
        @endfor



    </div>

    <!-- The Modal -->

    @include('component.modal', $process)
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(".delete").on("click", function() {
            let alertname = $(this).data("alertname");

            let ans = confirm("確認刪除「" + alertname + "」嗎?");

            if (!ans) {
                return false;
            }
        });
    </script>
@endsection
