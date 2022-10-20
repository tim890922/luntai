@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('style')
    <style>
        /* Style inputs with type="text", select elements and textareas */
        input[type=text],
        input[type=number],
        select,
        textarea {
            width: 100%;
            /* Full width */
            padding: 12px;
            /* Some padding */
            border: 1px solid #ccc;
            /* Gray border */
            border-radius: 4px;
            /* Rounded borders */
            box-sizing: border-box;
            /* Make sure that padding and width stays in place */
            margin-top: 6px;
            /* Add a top margin */
            margin-bottom: 16px;
            /* Bottom margin */
            resize: vertical
                /* Allow the user to vertically resize the textarea (not horizontally) */
        }

        /* Style the submit button with a specific background color etc */
        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* When moving the mouse over the submit button, add a darker green color */
        input[type=submit]:hover {
            background-color: #45a049;
        }

        /* Add a background color and some padding around the form */
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            員工進度回報</h1>
    </div>
    {{-- 訊息區 --}}
    @if (session()->has('notice'))
        <div class="px-3 mt-3 text-xl bg-green-400 rounded alert alert-success">
            {{ session('notice') }}
        </div>
    @endif

    <div class="w-auto h-auto px-3 py-3 mt-3 border border-gray-400">
        <div class="container">
            <form action="action_page.php">

                <label for="fname">料號</label>
                <input type="text" id="fname" name="product_id" placeholder="產品料號">

                <label for="lname">員工編號</label>
                <input type="text" id="lname" name="employee_id" placeholder="員工編號">

                <label for="country">班別</label>
                <input type="text" id="lname" name="shift" placeholder="班別">

                <label for="subject">生產時段</label>
                <input type="time" id="lname" name="time_start" placeholder="生產時段">
                到
                <input type="time" id="lname" name="time_end" placeholder="">

                <label for="good">良品數</label>
                <input type="number" step="1" id="lname" name="good_product_quantity" placeholder="良品數">

                <label for="fail">不良品總數</label>
                <input type="number" step="1" id="lname" name="defective_product_quantity" placeholder="不良品數">

                <label for="fail">不良種類</label>
                @include('component.select', ['lists' => $body['lists'], 'name' => $body['name']])

                <label for="res">不良原因</label>
                <textarea id="subject" name="detail" placeholder="Write something.." style="height:50px"placeholder="不良原因"></textarea>


                <input type="submit" value="Submit">

            </form>
        </div>

        <div>
        </div>
    </div>
@endsection
