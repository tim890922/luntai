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
    <div class="w-full mx-auto">
        <div class="w-full h-32 p-2 mb-3 bg-gray-500 rounded">
            <form action="">
                <table>
                    <tr>
                        <td>
                            選擇月份
                        </td>
                        <td>
                            <input type="month">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <canvas id="myChart" class="h-64 p-5 border border-black">
        </canvas>
    </div>
@endsection

@section('script')
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['一月', '二月', '三月'],
                datasets: [{
                    label: '銷售業績(百萬)',
                    data: [60, 49, 72]
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
                        text: 'Chart.js Bar Chart'
                    }
                }
            }
        });
    </script>
@endsection
