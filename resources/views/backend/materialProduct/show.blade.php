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
            {{ $header }}的物料清單</h1>
    </div>
    <div class="mt-3">
        <a href="/admin/materialProduct" class="px-3 text-xl bg-gray-300 border rounded hover:bg-gray-500">上一頁</a>
    </div>
    

    <div class="w-auto h-auto px-3 py-3 mt-3 bg-gray-300 border border-gray-400 ">
        <ul class="m-auto ">
            <button class="float-left" data-id="{{ $id }}">
                <img src="{{ asset('img/createSvg.svg') }}" style="height: 22px" class="inline float-left pt-1 mx-3 insert"
                    data-id="{{ $id }}">
            </button>

            <p class="my-2 text-xl font-bold cursor-pointer accordion">
                {{ $header }}</p>
            <ul class="pl-10 text-xl font-thin " style="display:block">
                @foreach ($content as $c)
                    <li class="my-4 ">
                        <div class="grid w-4/5 grid-cols-2 gap-1 hover:text-blue-600 accordion">

                            <div class="cursor-pointer ">
                                <button class="float-left" data-id="{{ $c['id'] }}">
                                    <img src="{{ asset('img/createSvg.svg') }}" style="height: 22px"
                                        class="inline float-left pt-1 mx-3 insert" data-id="{{ $c['id'] }}">
                                </button>

                                <img src="{{ asset('img/delete.svg') }}" style="height: 22px"
                                    class="inline float-left pt-1 mx-3 delete" data-id="{{ $c['pk'] }}" data-alert="{{ $c['material'] }}">
                                {{ $c['material'] }}
                            </div>
                            <div class="cursor-pointer ">
                                {{ $c['quantity'] . $c['unit'] }}
                            </div>
                        </div>
                        @if ($c['next'] != [])
                            <ul class="pl-10 text-xl font-thin " style="display:block">
                                @foreach ($c['next'] as $next)
                                    <div class="grid w-4/5 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                        <div class="cursor-pointer ">
                                            <button class="float-left" data-id="{{ $next['id'] }}">
                                                <img src="{{ asset('img/createSvg.svg') }}" style="height: 22px"
                                                    class="inline float-left pt-1 mx-3 insert"
                                                    data-id="{{ $next['id'] }}">
                                                </a>
                                                <img src="{{ asset('img/delete.svg') }}" style="height: 22px"
                                                    class="inline float-left pt-1 mx-3 delete"
                                                    data-id="{{ $next['pk'] }}" data-alert="{{ $c['material'] }}">
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
                                                    class="grid w-4/5 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                                    <div class="cursor-pointer ">
                                                        <button class="float-left" data-id="{{ $next['id'] }}">
                                                            <img src="{{ asset('img/createSvg.svg') }}"
                                                                style="height: 22px"
                                                                class="inline float-left pt-1 mx-3 insert"
                                                                data-id="{{ $next['id'] }}">
                                                        </button>
                                                        <img src="{{ asset('img/delete.svg') }}" style="height: 22px"
                                                            class="inline float-left pt-1 mx-3 delete"
                                                            data-id="{{ $next['pk'] }}" data-alert="{{ $c['material'] }}">{{ $next['material'] }}
                                                    </div>
                                                    <div class="cursor-pointer ">
                                                        {{ $next['quantity'] . $next['unit'] }}
                                                    </div>
                                                </div>
                                                @if ($c['next'] != [])
                                                    <ul class="pl-10 text-xl font-thin " style="display:block">
                                                        @foreach ($next['next'] as $next)
                                                            <div
                                                                class="grid w-4/5 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                                                <div class="cursor-pointer ">
                                                                    <button class="float-left"
                                                                        data-id="{{ $next['id'] }}">
                                                                        <img src="{{ asset('img/createSvg.svg') }}"
                                                                            style="height: 22px"
                                                                            class="inline float-left pt-1 mx-3 insert"
                                                                            data-id="{{ $next['id'] }}">
                                                                    </button>
                                                                    <img src="{{ asset('img/delete.svg') }}"
                                                                        style="height: 22px"
                                                                        class="inline float-left pt-1 mx-3 delete"
                                                                        data-id="{{ $next['pk'] }}" data-alert="{{ $c['material'] }}">
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
                                                                            class="grid w-4/5 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                                                            <div class="cursor-pointer ">
                                                                                <button class="float-left"
                                                                                    data-id="{{ $next['id'] }}">
                                                                                    <img src="{{ asset('img/createSvg.svg') }}"
                                                                                        style="height: 22px"
                                                                                        class="inline float-left pt-1 mx-3 insert"
                                                                                        data-id="{{ $next['id'] }}">
                                                                                </button>
                                                                                <img src="{{ asset('img/delete.svg') }}"
                                                                                    style="height: 22px"
                                                                                    class="inline float-left pt-1 mx-3 delete"
                                                                                    data-id="{{ $next['pk'] }}" data-alert="{{ $c['material'] }}">
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

    <div id="modalSpace" class="modal"></div>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(".insert").on("click", function() {
            let id = $(this).data("id");
         
            console.log('insert id=',id)
            $.get(`/admin/materialProduct/create/${id}`, function(res) {
                console.log("拿到資料了")
                $("#modalSpace").append(res)
                $('.modal').show()

            })
        })

        $(".delete").on("click", function() {
            // let material_id = $(this).data("id");
            let id = $(this).data("id");
            let alert=$(this).data("alert")
            let ans = confirm(`確認刪除`+alert);
            let _this=$(this);
            if(ans){
                $.ajax({
                type: "delete",
                url: `/admin/materialProduct/${id}`,
                success: function(e) {
                     _this.parents(".accordion").remove();
                     // location.reload()
                     Swal.fire(e)
                 },
            })
            }
            
        })

        $(document).on("click", ".close", function() {
            $("#modalSpace").empty().hide();
        })

        $(document).on("click", function(e) {
            if (e.target.id == "modalSpace") {
                $("#modalSpace").empty().hide();
            }

        })
    </script>
@endsection
