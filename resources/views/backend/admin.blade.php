@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="w-auto h-auto py-4 text-center bg-blue-300 border border-gray-400 center">
        <h1 class="text-4xl ">{{ $header }}</h1>
    </div>
    <div class="w-auto h-auto px-3 py-3 mt-3 border border-gray-400">
        <form action="{{ $action }}" method="POST">
            @csrf
            <button type="submit" class="px-3 my-5 bg-green-400 border rounded hover:bg-green-600" id="insert">新增{{ $title }}</button>
        </form>
        @isset($row)
             @include('component.table', ['row' => $row, 'col' => $col])
        @endisset
       


    </div>
@endsection

@section('script')
    {{-- <script>
        $("#insert").on("click", function() {
                $.get("/modals/add{{ $module }}", function(modal) {
                    $("#modal").html(modal)
                    $("#baseModal").modal("show")

                    $("#baseModal").on("hidden.bs.modal", function() {
                        $("#baseModal").modal("dispose")
                        $("#modal").html("")
                    })
                })
        })
    </script> --}}
@endsection
