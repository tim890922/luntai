<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>綸泰</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header class="flex items-center justify-between bg-gray-500" style="height: 100px">
        {{-- todo插入首頁 --}}
        <div class="pl-3 overflow-auto">
            <a href="#"
                class="flex items-center p-2 m-1 text-xs text-white rounded sm:text-2xl hover:bg-gray-800">
                <img src="https://www.luntai.com.tw/eimages/LOGO_20200803160850.png" alt=""
                    class="h-6 mr-3 sm:h-8">
                綸泰工廠管理系統
            </a>
        </div>
        <nav class="mr-5 ">
            <ul
                class="flex flex-wrap mr-5 text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                <li class="mr-2">
                    <a href="/" aria-current="page"
                        class="inline-block p-4 text-white @yield('header_stat_index') rounded-t-lg active dark:bg-gray-800 dark:text-blue-500 hover:bg-gray-50 hover:text-gray-600">首頁</a>
                </li>
                <li class="mr-2">
                    <a href="#"
                        class="inline-block p-4 text-white @yield('header_stat_product') rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">料號清單</a>
                </li>
                <li class="mr-2">
                    <a href="#"
                        class="inline-block p-4 text-white @yield('header_stat_production') rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">生產</a>
                </li>
                <li class="mr-2">
                    <a href="#"
                        class="inline-block p-4 text-white @yield('header_stat_storage') rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">庫存</a>
                </li>
                <li>
                    <a href="#"
                        class="inline-block p-4 text-white @yield('header_stat_order') rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">訂單</a>
                </li>
                <li>
                    <a href="#"
                        class="inline-block p-4 text-white @yield('header_stat') rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">關於</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('main')
    </main>

    <footer>

        
    </footer>
</body>
</html>