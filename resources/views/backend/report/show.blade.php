@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('style')
    <style>
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
    <div class="h-auto px-3 py-3 mt-3 bg-gray-400 border border-gray-400 rounded-auto ">
        <div class="float-left float">
            <a href="{{ $history }}" class="px-5 m-auto text-xl bg-blue-300 rounded hover:bg-blue-500" ">
                                            回上一頁
                                        </a>
                                    </div>
                                     @isset($body)
        <table class="mx-auto text-xl">
                                                                                                    
                             @foreach ($body as $item)
                    <tr>
                        <td class="text-right"> {{ $item['lable'] }} : </td>
                        <td
                            @isset($item['id'])
                            id="{{ $item['id'] }}"                            
                        @endisset>
                            {{ $item['text'] }} </td>
                    </tr>
                    @endforeach

                    </table>
                @endisset
                <table
                    class="w-4/5 mx-auto mt-4 text-center whitespace-no-wrap border border-collapse table-auto border-slate-400">
                    <thead>
                        <tr>
                            @foreach ($table['th'] as $item)
                                <th
                                    class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-300 border border-gray-600 rounded-tl rounded-bl title-font border-slate-300">
                                    {{ $item['lable'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($table['tb'] as $tb)
                            <tr class="border border-gray-600 ">
                                <td class="border border-gray-600 ">{{ $tb['reason'] }}</td>
                                <td class="border border-gray-600 " id="delete-quantity">{{ $tb['quantity'] }}</td>
                                <td class="border border-gray-600 ">{{ $tb['commend'] }}</td>
                                <td class="border border-gray-600 ">@include('component.href', $tb['edit'])</td>
                                <td class="border border-gray-600 ">@include('component.button', $tb['delete'])</td>
                                <td class="border border-gray-600 ">@include('component.button', $tb['check'])</td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="flex items-center justify-center mt-5 ">
                    <button id="insert-defective" class="px-3 bg-green-300 border rounded hover:bg-gray-500"
                        data-id="{{ $body[2]['text'] }}">新增不良品</button>
                </div>
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

            $(".check").on("click", function() {
                let _this = $(this)
                let id = _this.data("id")
                console.log(id);
                $.ajax({
                    type: 'post',
                    url: `/admin/defectiveReport/check/${_this.data('id')}`,
                    success: function(content) {
                        if (_this.text() == '已確認') {
                            _this.text('未確認')
                        } else {
                            _this.text('已確認')
                        }

                        Swal.fire(content)
                    }

                })
            })

            $("#insert-defective").on("click", function() {
                let id = $(this).data("id");
                let _this = $(this);
                $.ajax({
                    type: 'get',
                    url: `/admin/defectiveReport/create/` + id,
                    success: function(res) {
                        $("#modalSpace").append(res)
                        $('.modal').show()
                    }
                })
            })

            $(".delete").on("click", function() {
                let _this = $(this);
                let id = _this.data("id");
                let ans = confirm("確定要刪除嗎?");
                let quantity = $("#defective_product_quantity").text();
                let delete_quantity = $("#delete-quantity").text();

                if (ans) {
                    $.ajax({
                        type: 'delete',
                        url: `/admin/defectiveReport/delete/` + id,
                        success: function(e) {
                            Swal.fire(e.alert);
                            _this.parents('tr').remove();
                            $("#defective_product_quantity").text(quantity - delete_quantity);
                        }
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
