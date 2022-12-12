<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <title>{{ $id }}料號單</title>
</head>

<body class="p-5">
    <div class="grid grid-cols-2 ">


        @for ($i = 0; $i < 8; $i++)
            <div class="mb-3 border-2 border-black" style="height:226.7px;width:302.3px">
                <header class="py-2 text-xl text-center border-b-2 border-black" id="title">
                    料號單
                </header>

                <div class="py-1 text-center border-b-2 border-black " id="product_id">
                    {{ $id }}

                </div>

                <div id="content" class="grid grid-cols-4 grid-rows-2 ">
                    <div class="p-1 text-lg border border-black">數量</div>
                    <div class="p-1 text-lg border border-black"></div>
                    <div class="p-1 text-lg border border-black">作業員</div>
                    <div class="p-1 text-lg border border-black"></div>
                    <div class="p-1 text-lg border border-black">日期</div>
                    <div class="p-1 text-lg border border-black"></div>
                    <div class="p-1 text-lg border border-black">時間</div>
                    <div class="p-1 text-lg border border-black"></div>
                </div>

                <div id="barcode">
                    <div class="flex items-center justify-center h-auto p-1">
                        <img alt="Barcoded value {{ $id }}"
                            src="http://bwipjs-api.metafloor.com/?bcid=code128&text={{ $id }}"
                            style=" height:60px">
                    </div>

                </div>
            </div>
        @endfor
    </div>
    <script>
        $(document).ready(function() {
            print();
        })
    </script>
</body>

</html>
