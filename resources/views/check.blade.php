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
    <div class="m-3 ">
        <p>料號單：</p>
        <input type="text" id="1st_id" class="px-3 mt-3 border border-gray-500 rounded ">
        <br>
        <p>出貨單：</p>
        <input type="text" id="2ed_id" class="px-3 mt-3 border border-gray-500 rounded ">
        <button id="check">確認</button>
    </div>

</body>
<script>
    $(document).ready(function() {
        $("#1st_id").focus();
    })

    $("#1st_id").keypress(function(e) {

        if (e.which == 13) {
            console.log('hi');
            $("#2ed_id").focus();
        }
    })

    function play() {
        var audio = new Audio(
            'https://media.geeksforgeeks.org/wp-content/uploads/20190531135120/beep.mp3');
        audio.play();
    }
    $("#2ed_id").keypress(function(e) {

        if (e.which == 13) {
            let id_1 = $("#1st_id").val();
            let id_2 = $("#2ed_id").val();
            console.log(id_1, id_2);

            if (id_1 != id_2) {
                play();

                $("#1st_id").val("");
                $("#2ed_id").val("");
                $("#1st_id").focus();
            } else {
                $("#1st_id").val("");
                $("#2ed_id").val("");
                $("#1st_id").focus();
            }


        }
    })

    function beep(duration, frequency, volume) {
        return new Promise((resolve, reject) => {
            // Set default duration if not provided
            duration = duration || 200;
            frequency = frequency || 440;
            volume = volume || 100;

            try {
                let oscillatorNode = myAudioContext.createOscillator();
                let gainNode = myAudioContext.createGain();
                oscillatorNode.connect(gainNode);

                // Set the oscillator frequency in hertz
                oscillatorNode.frequency.value = frequency;

                // Set the type of oscillator
                oscillatorNode.type = "square";
                gainNode.connect(myAudioContext.destination);

                // Set the gain to the volume
                gainNode.gain.value = volume * 0.01;

                // Start audio with the desired duration
                oscillatorNode.start(myAudioContext.currentTime);
                oscillatorNode.stop(myAudioContext.currentTime + duration * 0.001);

                // Resolve the promise when the sound is finished
                oscillatorNode.onended = () => {
                    resolve();
                };
            } catch (error) {
                reject(error);
            }
        });
    }
</script>

</html>
