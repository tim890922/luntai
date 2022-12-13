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
           
            <form action="" class=" form">
                @csrf
                <table>
                    <tr>
                        <td>
                            選擇月份
                        </td>
                        <td>
                            <input type="date" name="start"> ~ <input type="date" name="end">
                        </td>

                    </tr>
                    <tr>
                        <td>料號</td>
                        <td>
                            <select name="product_id" id="">
                                <option value="0">請選擇料號</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->id }}</option>
                                @endforeach

                            </select>
                        </td>
                    </tr>
                </table>
                <div class="mt-4">
                    <a class="px-3 py-1 mt-5 bg-gray-300 border rounded cursor-pointer submit hover:bg-gray-500">查詢</a>
                </div>

            </form>
        </div>
        <div class="p-5 ">
            <canvas id="myChart" class="w-full h-64 p-4 border border-black rounded">
            </canvas>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(".submit").on("click", function() {
            let _this = $(this);
            let formData = _this.parents('.form').serializeArray();
            console.log();
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
                                        type: 'bar',
                                        label: '數量',
                                        data: res.data,
                                        yAxisID: 'y1'
                                    },
                                    {
                                        type: 'line',
                                        label: '累積數量百分比',
                                        data: res.percentage,
                                        fill: false,
                                        yAxisID: 'y2'
                                    }
                                ]
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
                                },
                                scales: {
                                    y1: {

                                        position: "left",
                                        stacked: true,
                                        ticks: {
                                            major: {
                                                enabled: true,
                                            },
                                            callback: function(value) {
                                                if (value % 1 === 0) {
                                                    return value;
                                                }
                                            }
                                        }
                                    },
                                    y2: {
                                        position: "right",
                                        stacked: true,
                                        min: 0,
                                        max: 1,
                                        beginAtZero: true,
                                        ticks: {

                                            major: {
                                                enabled: true,
                                            },
                                            callback: function(value) {
                                                if (value % 0.5 === 0) {
                                                    return value;
                                                }
                                            }
                                        }
                                    }
                                },
                            }
                        })
                    }
                })
            }
        });
    </script>
@endsection
