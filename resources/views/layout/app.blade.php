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
        <div class="w-1/5 h-auto px-4 py-3 my-4 bg-gray-200" style="height:500px">
            <h1 class="text-2xl text-left">功能選單</h1>


            <div>
                <ul class="text-xl text-left ">
                    <li class="my-1 border-b-2 border-gray-500"><a href="order"
                            class="block hover:text-blue-600">訂單</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="employee"
                            class="block hover:text-blue-600">人員管理</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="product"
                            class="block hover:text-blue-600">料號清單</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="machine"
                            class="block hover:text-blue-600">機台管理</a></li>

                </ul>
            </div>
        </div>

        {{-- 中間內容 --}}
        <div class="w-4/5 my-4 ml-3" style="height: 500px">
            <div class="w-auto py-4 text-center bg-blue-300 border border-gray-400 center" style="height:80px">
                <h1 class="text-4xl ">{{ $title }}</h1>
            </div>
            <div class="w-auto px-3 py-3 mt-3 border border-gray-400" style="height: 402px">
               <a href="#" class="px-3 my-5 bg-blue-400 border rounded">新增{{ $header }}</a>
                @include('component.table')

            </div>

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
