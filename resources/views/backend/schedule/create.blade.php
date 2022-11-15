@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            訂單排程</h1>
    </div>
    <div class=" w-auto h-auto px-3 py-3 mt-3 border border-gray-400 pb-10">
        @foreach ($body as $items)
            <div class=" border rounded bg-gray-100 mt-3 p-3">
                <form action="/admin/schedule" method="POST" class=" form">
                    @csrf
                    <table>
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    {{ $item['lable'] }}
                                </td>
                                <td class="px-3 py-2">
                                    @switch($item['tag'])
                                        @case('input')
                                            @include('component.input', $item)
                                            @if ($errors->has($item['name']))
                                                <p style="color:red" class="text-base ">請填寫此項目</p>
                                            @endif
                                        @break

                                        @case('select')
                                            @include('component.select', [
                                                'lists' => $item['lists'],
                                                'name' => $item['name'],
                                            ])
                                        @break

                                        @case('')
                                            <p
                                                @isset($item['value'])
                                    value="{{ $item['value'] }}"
                                @endisset>
                                                {{ $item['text'] }}
                                            </p>
                                        @break
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>預計總生產工時：</td>
                            <td class=" work_time" data-id="{{ $items[0]['value'] }}">放時間

                            </td>
                        </tr>
                    </table>
                    <a
                        class=" mt-3 border rounded border-gray-400 bg-blue-300 hover:bg-blue-500 px-1 schedule cursor-pointer">發放製令</a>
                </form>

            </div>
        @endforeach

    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(document).ready(function() {
            console.log("ready!");

        });

        $(".schedule").on("click", function() {
            let _this = $(this);
            let formData = _this.parent('.form').serializeArray();
            console.log(formData);

            $.ajax({
                type: `post`,
                url: `/admin/schedule`,
                data: formData,
                success: function(content) {}(
                    alert(content)
                ),
                error:function(err){
                    console.log('error')
                    alert('有欄位沒填寫')
                }

            })
        })
    </script>
@endsection
