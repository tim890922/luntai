@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('style')
    <style>
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        .form {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        .form button {}

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }



        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Modal Header */
        .modal-header {
            padding: 8px 16px;
        }

        /* Modal Body */
        .modal-body {
            padding: 2px 16px;
        }

        /* Modal Footer */
        .modal-footer {
            padding: 2px 16px;
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            /* margin: auto; */
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }
    </style>
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
        <div class="flex ">
            <h2 class="pl-3 mb-3 text-3xl ">製程資料</h2>
            {{-- button按鈕 --}}
            <button onclick="history.back()" value="回到上一頁" class="ml-5 ">回上一頁</button>
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
                <div class="flex items-center justify-center ">
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
