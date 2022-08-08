@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="w-auto py-4 text-center bg-blue-300 border border-gray-400 center" style="height:80px">
        <h1 class="text-4xl ">{{ $header }}</h1>
    </div>
    <div class="w-auto px-3 py-3 mt-3 border border-gray-400" style="height: 402px">
        <form action="{{ $action }}" method="POST">
            @csrf
            <button type="submit" class="px-3 my-5 bg-blue-400 border rounded" id="insert">新增{{ $title }}</button>
        </form>
        @include('component.table', ['row' => $row, 'col' => $col])


    </div>
@endsection

@section('script')
@endsection
