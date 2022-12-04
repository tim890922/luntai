<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>綸泰</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <link rel="icon"
        href="https://cdn4.iconfinder.com/data/icons/unigrid-flat-buildings/90/008_079_factory_production_manufacturer_industry_industrial-256.png"
        type="image/x-icon" />
    {{-- <script src="{{ asset('chart.js/chart.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @yield('style')
</head>

<body>
    <header class="mx-auto bg-gray-600 " style="height:100px">
        <div class="flex justify-between mx-5">
            <div>
                <a href="/" class="flex pl-3 text-6xl text-white ">
                    <img src="{{ asset('img/factoryLogo.png') }}" style="height: 100px" class="py-2 ">

                    工廠管理系統

                </a>
            </div>


            <p class="right-0 "> </p>
            <div class="py-10 pr-3 ">
                
                <a href='/logout'
                    class="p-2 text-xl font-bold bg-gray-300 border-2 border-gray-300 rounded hover:bg-gray-400 hover:border-gray-400">登出</a>
            </div>


        </div>


    </header>
    <main class="flex mx-5">
        {{-- 側邊選單 --}}

        @yield('side')


        {{-- 中間內容 --}}
        <div class="w-4/5 h-auto my-4 ml-3">
            @yield('main')

        </div>


    </main>


    <footer class="py-3 mx-auto bg-gray-500" style="height:50px">
        <p class="text-2xl text-center "></p>
    </footer>

    {{-- <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script> --}}
    <script src="{{ asset('js/my.js') }}"></script>
    {{-- <script src="{{ asset('chart.js/chart.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    @yield('script')

</body>



</html>
