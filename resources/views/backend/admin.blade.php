@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="w-auto h-auto py-4 text-center bg-blue-300 border border-gray-400 center">
        <h1 class="text-4xl ">{{ $header }}</h1>
    </div>
    @if (session()->has('notice'))
        <div class="bg-green-400 rounded alert alert-success">
            {{ session('notice') }}
        </div>
    @endif
    <div class="w-auto h-auto px-3 py-3 mt-3 border border-gray-400">

        <a href=" @isset($href) {{ $href }}" @endisset type="submit"
            class="px-3 my-5 bg-green-400 border rounded hover:bg-green-600" id="insert">新增{{ $title }}</a>
        </form>


        @csrf
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
            let id = $(this).data('id')
            let _this = $(this)
            $.ajax({
                type: 'delete',
                url: `/admin/{{ strtolower($module) }}/${id}`,
                success: function() {
                    _this.parents('tr').remove()
                }
            })
        })
    </script>
@endsection
