@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full mb-3 text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            {{ $header }}</h1>
    </div>
    @isset($subtitle)
        <div class="p-3 mx-auto mt-3 rounded ">
            @foreach ($subtitle['button'] as $body)
                <a class="@isset($body['class']) {{ $body['class'] }} @else p-3 mx-3 bg-blue-300 border rounded-full cursor-pointer hover:bg-blue-500 @endisset"
                    href="{{ $body['href'] }}">{{ $body['text'] }}</a>
            @endforeach
        </div>
    @endisset

    @isset($history)
        <a href="{{ $history }}" value="回到上一頁"
            class="p-3 mt-5 mr-3 text-center bg-gray-300 rounded cursor-pointer hover:bg-gray-500">回上一頁</a>
    @endisset

    @isset($finish)
        生產完成按鈕：
        <button id="finish" class= "border border- rounded bg-orange-300" data-id="{{ $finish['id'] }}">{{ $finish['text'] }}</button>
    @endisset

    {{-- 訊息區 --}}
    @if (session()->has('notice'))
        <div class="px-3 mt-3 text-xl bg-green-400 rounded alert alert-success">
            {{ session('notice') }}
        </div>
    @endif

    {{-- 內容 --}}

    <div class="w-auto h-auto px-3 py-3 mt-3 border border-gray-400">

        <div class="flex items-center justify-left">
            @isset($title)
                <a href=" @isset($href) {{ $href }}" @endisset type="submit"
                    class="px-3 my-5 bg-green-400 border rounded hover:bg-green-600" id="insert">新增{{ $title }}
                </a>
            @endisset

            @csrf
            @isset($import)
                <form action="/admin/{{ $import['action'] }}" method="POST" enctype="multipart/form-data"
                    class="flex items-center justify-center ml-5">@csrf
                    @isset($lists)
                        <div class="">
                            請選擇客戶：
                            @include('component.select', ['lists' => $lists, 'name' => $name])
                        </div>
                    @endisset
                    <div>
                        <input type="file" name="{{ $import['file'] }}" accept=".xlsx,.csv,.xls," class="ml-3 " required>
                        <br>
                        <input type="submit" value="{{ $import['text'] }}"
                            class="px-1 py-1 mt-2 ml-3 border border-gray-700 hover:bg-gray-500" style="width:80px">

                    </div>
                </form>
            @endisset
        </div>




        @isset($row)
            @include('component.table', ['row' => $row, 'col' => $col])
        @endisset



    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        @isset($module)
            $(".delete").on("click", function() {
                let alertname = $(this).data("alertname");

                let ans = confirm("確認刪除「" + alertname + "」嗎?");

                if (ans) {
                    let id = $(this).data("id");
                    let _this = $(this);
                    $.ajax({
                        type: "delete",
                        url: `/admin/{{ $module }}/${id}`,
                        success: function() {
                            _this.parents("tr").remove();
                            // location.reload();

                        },
                    });
                }
            });
        @endisset



        $(".check").on("click", function() {
            let _this = $(this)
            let id = $(this).data('id')
            let ans = true
            if (_this.text() == "已確認") {
                ans = confirm("確定要取消確認")
            }
            if (ans) {
                $.ajax({
                    type: 'patch',
                    url: `/admin/report/show/check/${_this.data('id')}`,
                    success: function(content) {
                        console.log(content)
                        if (_this.text() == "已確認") {
                            _this.text("未確認")
                            alert(content);
                        } else {
                            _this.text("已確認")
                            alert(content);
                        }

                    }
                })
            }

        })


        $(".output").on("click", function() {
            let _this = $(this)
            let id = $(this).data('id')

            $.ajax({
                type: `patch`,
                url: `/admin/order/output/${_this.data('id')}`,

                success: function(content) {
                    console.log(content)
                    if (_this.text() == "出貨") {
                        _this.text("未出貨")
                        alert(content);
                    } else {
                        _this.text("出貨")
                        alert(content);
                    }

                }
            })
        })

        $(".load").on("click", function() {
            let id = $(this).data('id')
            let _this = $(this)
            console.log(id)
            $.ajax({
                type: `post`,
                url: `/admin/order/load/${id}`,
                success: function(content) {


                    if (_this.text() == "未圈存") {
                        if (content == "圈存成功") {
                            _this.text("圈存")
                            alert(content);
                        } else
                            alert(content);

                    } else {
                        _this.text("未圈存")
                        alert(content);
                    }
                    console.log(content)
                }

            })
        })

        $("#finish").on("click", function() {
            let id = $(this).data("id");
            let _this = $(this);
            $.ajax({
                type: `post`,
                url: `/admin/report/finish/${id}`,
                success: function(e) {
                    console.log(e.alert);
                    Swal.fire(e.alert);
                    _this.text(e.text)
                }
            })
        })
    </script>
@endsection
