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
    <header class="container mx-auto bg-gray-600 " style="height:100px">
        <div class="flex justify-items-center">
            <img src="{{ asset('img/logo.png') }}" style="height: 100px">
            <p class="text-6xl text-white">
                綸泰後台管理系統
            </p>
        </div>
    </header>
    <main class="container flex mx-auto">
        <menu class="w-1/5 h-auto bg-gray-200" style="height:500px">
            <div>
                <ul class="text-xl text-center ">
                    <li class="block my-5 "><a href="" class="hover:text-blue-600">訂單</a></li>
                    <li class="block my-5 "><a href="" class="hover:text-blue-600">人員管理</a></li>
                    <li class="block my-5 "><a href="" class="hover:text-blue-600">料號清單</a></li>
                    <li class="block my-5 "><a href="" class="hover:text-blue-600">機台管理</a></li>
                    
                </ul>
            </div>
        </menu>
        <div class="w-4/5 my-4 bg-red-500" style="height: 500px">

        </div>
    </main>


    <footer class="container mx-auto bg-red-500 " style="height:100px">
        <p class="text-4xl text-center ">版權</p>
    </footer>
</body>

</html>
