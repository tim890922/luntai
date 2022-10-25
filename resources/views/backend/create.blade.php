@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')



    {{-- @if ($errors->any())
        <ul>

            @foreach ($errors->all() as $error)
                <li class="bg-red-400 ">{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}



    @isset($header)
        <div class="mx-auto ">
            <h1
                class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
                {{ $header }}</h1>
        </div>
    @endisset

    @if (session()->has('notice'))
        <div class="px-3 mt-3 text-xl bg-blue-400 rounded alert alert-success">
            {{ session('notice') }}
        </div>
    @endif

    <div class="-auto h-auto px-3 py-3 mt-3 border border-gray-400 bg-gray-400 rounded">
        <div class="p-10 ">
            <form action="{{ $action }}" method="POST">
                @csrf
                @isset($method)
                    @method($method)
                @endisset
                <table class="mx-auto text-xl">
                    @isset($body)
                        @foreach ($body as $index => $row)
                            <tr>
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
                                    @endswitch

                                </td>
                            </tr>
                        @endforeach
                    @endisset

                </table>
                <div class="flex w-1/2 mx-auto my-3 center pl-20    ">
                    <Button type="submit" class="px-3 m-auto bg-gray-300 rounded hover:bg-gray-500">送出</Button>
                    <button type="reset" class="px-3 m-auto bg-red-300 rounded hover:bg-red-500">重置</button>
                </div>
            </form>

            @isset($redirect)
                <div class="float float-right">
                    <a href="{{ $redirect }}" class=" m-auto bg-blue-300 rounded hover:bg-blue-500 text-2xl px-5">
                        @if ($redirect[-1] == 1)
                            切至入庫
                        @else
                            切至出庫
                        @endif
                    </a>
                </div>
            @endisset
        
        </div>
    </div>
@endsection
