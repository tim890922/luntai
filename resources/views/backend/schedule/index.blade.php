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
    <div class="w-auto h-auto px-3 py-3 pb-10 mt-3 border border-gray-400 ">
        <form action="{{ $action }}">

            @include('component.table', ['col' => $col, 'row' => $row])
            <div class="flex float-right ">
                <button type="submit" class="px-3 border rounded hover:bg-gray-500">開始排程</button>
            </div>
        </form>

    </div>
@endsection


<!-- <div class="mx-auto ">
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
        <div class="px-2 py-2 my-3 bg-gray-300 border border-black ">
            射出機1-1
           <button class="px-3 rounded ">新增一列</button>
           <form action="">

            <label for="">訂單批號：</label>
            <select name="" id=""  class="mr-4 ">訂單批號</select>

            <label for="">內容：</label>
            <select name="" id="" class="mr-4 "></select>

            <label for="">生產時間</label>
            <input type="time">
            -
            <input type="time">

            <label for="" class="mr-4">料號：123</label>

            <label for="" class="mr-4">計畫數量：</label>

            <label for="">預計產量：</label>
            <input type="number" step="1" class="mr-4">

           </form>
           <div class="mt-5 border border-gray-200 ">
            產品資訊
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores tempora, totam dolore quos obcaecati aliquid id a in pariatur reiciendis labore nemo nisi minima rerum eligendi neque repellendus fugit at.
           </div>
        </div>
        <div class="px-2 py-2 my-3 bg-gray-300 border border-black ">
            機台二區塊
        </div>
        <div class="px-2 py-2 my-3 bg-gray-300 border border-black ">
            機台三區塊
        </div>
        
    </div> -->
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

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
    </script>
@endsection
