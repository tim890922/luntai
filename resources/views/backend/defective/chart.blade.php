@extends('layout.app')
@section('side')
    @include('component.side')
@endsection

@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full mb-3 text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            圖表</h1>
    </div>
    <div class="w-full mx-auto " id="chart-div">
        <div class="w-full h-32 p-2 mb-3 bg-yellow-200 rounded">
            <a href="/admin/defectiveReport" class=" cursor-pointer border rounded bg-gray-300 hover:bg-gray-500 float-right px-3 ">回上一頁</a>
            <form action="" class=" form">
                @csrf
                <table>
                    <tr>
                        <td>
                            選擇月份
                        </td>
                        <td>
                            <input type="month" name="start"> ~ <input type="month" name="end">
                        </td>

                    </tr>
                </table>
                <div class="mt-4">
                    <a class="px-3 py-1 mt-5 bg-gray-300 border rounded submit hover:bg-gray-500 cursor-pointer">查詢</a>
                </div>

            </form>
        </div>
        <canvas id="myChart" class="w-full h-64 p-5 border border-black rounded ">
        </canvas>
    </div>
@endsection

@section('script')
    <script>
        $(".submit").on("click", function() {
            let _this = $(this);
            let formData = _this.parents('.form').serializeArray();
            console.log(formData[0].value);
            if (formData[1].value > formData[2].value) {
                console.log('重新輸入月份')
                Swal.fire('重新輸入月份(起始月份~結束月份)')
            } else {

                $.ajax({
                    type: `post`,
                    url: `/admin/getDefective`,
                    data: formData,
                    success: function(res) {
                        $('#myChart').remove();
                        $('#chart-div').append(
                            '<canvas id="myChart" class="h-64 p-5 border border-black"></canvas>');
                        var ctx = document.getElementById('myChart');
                        console.log(res)

                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: res.labels,
                                datasets: [{
                                    label: '數量',
                                    data: res.data
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: ''
                                    }
                                }
                            }
                        });

                    }
                })
            }
        })



        // var ctx = document.getElementById('myChart');
        // var myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: ['一月', '二月', '三月'],
        //         datasets: [{
        //             label: '銷售業績(百萬)',
        //             data: [60, 49, 72]
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         plugins: {
        //             legend: {
        //                 position: 'top',
        //             },
        //             title: {
        //                 display: true,
        //                 text: 'Chart.js Bar Chart'
        //             }
        //         }
        //     }
        // });
    </script>
@endsection
