<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>綸泰</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <header class="container mx-auto bg-gray-600 " style="height:100px">
        <div class="flex justify-items-center">
            <img src="{{ asset('img/logo.png') }}" style="height: 100px">
            <p class="text-6xl text-white">
                綸泰後台管理系統
            </p>
        </div>
    </header>
    <main class="container flex mx-auto">
        {{-- 側邊選單 --}}

        @yield('side')


        {{-- 中間內容 --}}
        <div class="w-4/5 h-auto my-4 ml-3" >
            @yield('main')

        </div>


    </main>


    <footer class="container mx-auto bg-red-500 " style="height:100px">
        <p class="text-4xl text-center ">版權</p>
    </footer>
</body>

<script>
    var opt = {
        "oLanguage": {
            "sUrl": "{{ asset('dataTables.zh-tw') }}"
        },
        "order": [
            [0, 'asc']
        ]
    };
    $(document).ready(function() {
        $('#table_1').DataTable();
    });
</script>

</html>
@yield('script')
