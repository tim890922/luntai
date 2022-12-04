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
    @if (session()->has('notice'))
        <div class="px-3 mt-3 text-xl bg-green-400 rounded alert alert-success">
            {{ session('notice') }}
        </div>
    @endif
    <div class="h-auto px-3 py-3 mt-3 bg-gray-400 border border-gray-400 rounded-auto ">
        <div class="float-left float">
            <a href="/admin/defectiveReport/" class="px-5 m-auto text-xl bg-blue-300 rounded hover:bg-blue-500" ">
                回上一頁
            </a>
        </div>
        <div class="p-10 ">

            <div>
                @isset($body)
                    <table class="mx-auto text-xl">
                        @foreach ($body as $item)
                            <tr>
                                <td class="text-right"> {{ $item['lable'] }} : </td>
                                <td>{{ $item['text'] }} </td>
                            </tr>
                        @endforeach

                    </table>
                @endisset
                <table
                    class=" w-4/5 mx-auto mt-4 text-center whitespace-no-wrap border border-collapse table-auto border-slate-400">
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
                                <td class="border border-gray-600 ">{{ $tb['quantity'] }}</td>
                                <td class="border border-gray-600 ">{{ $tb['commend'] }}</td>
                                <td class="border border-gray-600 ">@include('component.href', $tb['edit'])</td>
                                <td class="border border-gray-600 ">@include('component.button', $tb['check'])</td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class=" flex items-center justify-center mt-5">

                </div>
            </div>

        </div>
    </div>
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
                        _this.text('確認')
                    } else {
                        _this.text('已確認')
                    }

                    Swal.fire(content)
                }

            })
        })
    </script>
@endsection
