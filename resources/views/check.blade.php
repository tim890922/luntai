<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon"
        href="https://cdn4.iconfinder.com/data/icons/unigrid-flat-buildings/90/008_079_factory_production_manufacturer_industry_industrial-256.png"
        type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <title>料號檢核</title>
</head>

<body>
    <header class="mx-auto bg-gray-600 " style="height:100px">
        <div class="flex justify-between mx-5">
            <div>
                <a href="/" class="flex pl-3 text-6xl text-white ">

                    料號檢核
                </a>
            </div>
            <p class="right-0 "> </p>

        </div>
    </header>
    <div class=" m-3">
        <p>料號單：</p>
        <input type="text" id="1st_id" class=" border border-gray-500 rounded px-3 mt-3">
        <br>
        <p>出貨單：</p>
        <input type="text" id="2ed_id" class=" border border-gray-500 rounded px-3 mt-3">
        <button id="check">確認</button>
    </div>

</body>
<script>
    $("#check").on("click", function() {
        let id_1 = $("#1st_id").val()
        let id_2 = $("#2ed_id").val()
        console.log(id_1)
        $("#1st_id").val("")
        $("#2ed_id").val("")


    })

    
</script>

</html>
