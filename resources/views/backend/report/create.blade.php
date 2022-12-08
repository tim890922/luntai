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
    <div class="w-auto h-auto px-3 py-3 mt-3 border border-gray-400 ">
        <form action="/admin/report" method="POST">
            @csrf

            <table class="mx-auto text-xl">
                @isset($body)
                    @foreach ($body as $index => $row)
                        <tr @isset($row['type']) @if ($row['type'] == 'hidden') class="hidden" @endif @endisset>
                            @isset($row['lable'])
                                <td class="text-right ">{{ $row['lable'] }}</td>
                            @endisset
                            <td class="px-3 py-2">
                                @switch($row['tag'])
                                    @case('input')
                                        @include('component.input', $row)
                                        @if ($errors->has($row['name']))
                                            <p style="color:red" class="text-base ">請填寫此項目</p>
                                        @endif
                                    @break

                                    @case('select')
                                        @include('component.select', [
                                            'lists' => $row['lists'],
                                            'name' => $row['name'],
                                        ])
                                    @break

                                    @case('')
                                        <p @isset($row['value'])
                                        value="{{ $row['value'] }}"
                                    @endisset
                                            @isset($row['name'])
                                    name="{{ $row['name'] }}"
                                @endisset>
                                            {{ $row['text'] }}
                                        </p>
                                    @break
                                @endswitch

                            </td>
                        </tr>
                    @endforeach
                @endisset

            </table>
            @isset($table)
                <table
                    class="w-1/2 mx-auto mt-4 text-center whitespace-no-wrap border border-collapse table-auto border-slate-400">
                    <thead>
                        <tr>
                            @foreach ($table['th'] as $item)
                                <th
                                    class="px-4 py-3 text-sm font-medium tracking-wider text-gray-900 bg-gray-300 border rounded-tl rounded-bl title-font border-slate-300">
                                    {{ $item['lable'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($table['tb'] as $tb)
                            <tr>
                                <td class="p-3 ">{{ $tb['lable'] }}</td>
                                <td class="p-3 ">@include('component.input', $tb['input'])</td>
                                <td class="p-3 ">@include('component.input', $tb['commend'])</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endisset
            <div class="flex w-1/2 pl-20 mx-auto my-5 center ">
                <Button type="submit" class="px-3 m-auto bg-gray-300 rounded hover:bg-gray-500">送出</Button>
                <button type="reset" class="px-3 m-auto bg-red-300 rounded hover:bg-red-500">重置</button>
            </div>
        </form>

    </div>
@endsection

@section('script')
    <script>
        $('.insertRow').on("click", funtion() {
            let _this = $(this)

        })
    </script>
@endsection
