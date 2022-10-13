@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            {{ $header }}</h1>
    </div>
    {{-- 訊息區 --}}
    @if (session()->has('notice'))
        <div class="px-3 mt-3 text-xl bg-green-400 rounded alert alert-success">
            {{ session('notice') }}
        </div>
    @endif

    {{-- 內容 --}}
    <div class="w-auto h-auto px-3 py-3 mt-3 border border-gray-400">

        <div class="flex items-center justify-left">
            <a href=" @isset($href) {{ $href }}" @endisset type="submit"
                class="px-3 my-5 bg-green-400 border rounded hover:bg-green-600" id="insert">新增{{ $title }}
            </a>
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
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".delete").on("click", function() {
            let alertname = $(this).data('alertname');

            let ans = confirm('確認刪除「' + alertname + "」嗎?");

            if (ans) {
                let id = $(this).data('id')
                let _this = $(this)
                $.ajax({
                    type: 'delete',
                    url: `/admin/{{ $module }}/${id}`,
                    success: function() {
                        _this.parents('tr').remove()
                    }

                })
            }
        })
    </script>
@endsection
