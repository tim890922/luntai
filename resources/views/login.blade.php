<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>綸泰</title>
</head>

<body class="bg-gray-400 ">

    <header class="mx-auto bg-gray-600 " style="height:100px">
        <div class="flex mx-5">
            <img src="{{ asset('img/factoryLogo.png') }}" style="height: 100px" class="py-2 ">
            <p class="pt-2 pl-3 text-6xl text-white">
                工廠管理系統
            </p>
        </div>

    </header>

    <main class="h-full ">


        <h1 class="text-5xl font-bold text-center ">
            登入
        </h1>

        <div class="flex items-center justify-center ">

            <form action="login" method="post">
                @csrf
                <div class="text-3xl ">
                    <p class="inline ">帳號：</p>
                    <input name="account" type="text" class="w-2/3 border border-black ">
                </div>
                <br>
                <div class="text-3xl">
                    <p class="inline ">密碼：</p>
                    <input name="pass_word" type="password" class="w-2/3 border border-black ">
                </div>
                <br>
                <div class="flex items-center justify-center text-2xl ">
                    <button type="submit" class="w-32 bg-blue-500 border border-black rounded ">登入</button>
                    <!-- <button type="reset" class="bg-gray-600 border border-black rounded flex-right">重置</button> -->

                </div>

            </form>
        </div>
    </main>

    {{--<script>
        @if (isset($err))
            alert("{{ $err }}")
        @endif
    </script>--}}
   
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(isset($err))
        Swal.fire('{{ $err }}')
        @endif
    </script> 
</body>

</html>
