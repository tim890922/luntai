@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            發放製令</h1>
    </div>
    <div class="w-auto h-auto px-3 py-3 pb-10 mt-3 border border-gray-400 ">
        @for ($i = 0; $i < count($body); $i++)
            <div class="p-3 mt-3 bg-gray-100 border rounded ">
                <form action="/admin/schedule" method="POST" class=" form">
                    @csrf
                    <table id="table_{{ $body[$i][0]['value'] }}" class="mb-3 ">
                        @foreach ($body[$i] as $item)
                            <tr>
                                <td>
                                    {{ $item['lable'] }}
                                </td>
                                <td class="px-3 py-2">
                                    @switch($item['tag'])
                                        @case('input')
                                            @include('component.input', $item)
                                            @if ($errors->has($item['name']))
                                                <p style="color:red" class="text-base ">請填寫此項目</p>
                                            @endif
                                        @break

                                        @case('select')
                                            @include('component.select', [
                                                'lists' => $item['lists'],
                                                'name' => $item['name'],
                                                'data_attr' => isset($item['data_attr'])
                                                    ? $item['data_attr']
                                                    : null,
                                            ])
                                        @break

                                        @case('')
                                            <p
                                                @isset($item['value'])
                                    value="{{ $item['value'] }}"
                                @endisset>
                                                {{ $item['text'] }}
                                            </p>
                                        @break
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>預計總生產工時(小時)：</td>
                            <td class="work_time">

                            </td>
                        </tr>
                    </table>

                    <a
                        class="px-1 mt-3 bg-blue-300 border border-gray-400 rounded cursor-pointer hover:bg-blue-500 schedule">{{ $status[$i] }}</a>
                </form>

            </div>
        @endfor
        <div class="w-auto  bg-gray-300 ">
            <p class="my-2 text-xl font-bold cursor-pointer accordion">
                {{ $header }}</p>
            <ul class="pl-10 text-xl font-thin " style="display:block">
                @foreach ($content as $c)
                    <li class="my-4 ">
                        <div class="grid w-4/5 grid-cols-2 gap-1 hover:text-blue-600 accordion">

                            <div class="cursor-pointer ">
                                {{ $c['material'] }}
                            </div>
                            <div class="cursor-pointer flex">
                                <div class="flex quantity">{{ $c['quantity'] }}</div>{{ $c['unit'] }}
                            </div>
                        </div>
                        @if ($c['next'] != [])
                            <ul class="pl-10 text-xl font-thin " style="display:block">
                                @foreach ($c['next'] as $next)
                                    <div class="grid w-4/5 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                        <div class="cursor-pointer ">

                                            {{ $next['material'] }}
                                        </div>
                                        <div class="cursor-pointer flex">
                                            <div class="flex quantity">{{ $next['quantity'] }}</div>{{ $next['unit'] }}
                                        </div>
                                    </div>
                                    @if ($c['next'] != [])
                                        <ul class="pl-10 text-xl font-thin " style="display:block">
                                            @foreach ($next['next'] as $next)
                                                <div
                                                    class="grid w-4/5 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                                    <div class="cursor-pointer ">
                                                        {{ $next['material'] }}
                                                    </div>
                                                    <div class="cursor-pointer flex">
                                                        <div class="flex  quantity">{{ $next['quantity'] }}</div>
                                                        {{ $next['unit'] }}
                                                    </div>
                                                </div>
                                                @if ($c['next'] != [])
                                                    <ul class="pl-10 text-xl font-thin " style="display:block">
                                                        @foreach ($next['next'] as $next)
                                                            <div
                                                                class="grid w-4/5 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                                                <div class="cursor-pointer ">

                                                                    {{ $next['material'] }}
                                                                </div>
                                                                <div class="cursor-pointer flex">
                                                                    <div class="flex quantity">{{ $next['quantity'] }}
                                                                    </div>
                                                                    {{ $next['unit'] }}
                                                                </div>
                                                            </div>
                                                            @if ($c['next'] != [])
                                                                <ul class="pl-10 text-xl font-thin " style="display:block">
                                                                    @foreach ($next['next'] as $next)
                                                                        <div
                                                                            class="grid w-4/5 grid-cols-2 gap-1 my-4 hover:text-blue-600 accordion">
                                                                            <div class="cursor-pointer ">

                                                                                {{ $next['material'] }}
                                                                            </div>
                                                                            <div class="cursor-pointer flex">
                                                                                <div class="flex quantity">
                                                                                    {{ $next['quantity'] }}</div>
                                                                                {{ $next['unit'] }}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    {{-- @endforeach --}}
                @endforeach

            </ul>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        let machineTime = null;

        $(document).ready(function() {
            let timeBox = $(".work_time");
            let machineTimeStr = '{!! json_encode($machineTime) !!}';
            machineTime = JSON.parse(machineTimeStr)
            console.log(machineTime)
            let productData = $(".work_time").data("id");
            console.log(productData);
            // $.ajax({
            //     type: `post`,
            //     url: `/admin/getMachineTime`,
            //     date: ,
            // })

        });

        function ComputeWorkTime(table_id, workstation_id, product_id) {
            let unittime = 0;
            if (machineTime[product_id] != undefined) {
                console.log(machineTime[product_id][workstation_id])
                unittime = machineTime[product_id][workstation_id];
            }

            let total_quantity = $("#" + table_id + " input[name=total_quantity]").val();

            $("#" + table_id + " .work_time").html((unittime * total_quantity / 3600).toFixed(2));

        }


        $(document).on("change", "input[name=total_quantity]", function() {
            console.log("total_quantity change");
            let table_id = $(this).parents("table").prop("id");
            let workstation_id = $("#" + table_id + " select[name=workstation_id]").val();
            let product_id = $("#" + table_id + " input[name=product_id]").val();
            console.log(table_id, workstation_id, product_id)
            ComputeWorkTime(table_id, workstation_id, product_id);
          
        });

        $(document).on("change", "select[name=workstation_id]", function() {
            let table_id = $(this).parents("table").prop("id");
            let workstation_id = $(this).val();
            let product_id = $(this).data("id");
            ComputeWorkTime(table_id, workstation_id, product_id);
        });



        $(".schedule").on("click", function() {
            let _this = $(this);
            let formData = _this.parent('.form').serializeArray();
            console.log(formData);
            if (!(_this.text() == '已發放')) {
                $.ajax({
                    type: `post`,
                    url: `/admin/schedule`,
                    data: formData,
                    success: function(res) {
                            Swal.fire(res)
                            _this.text('已發放')
                        }

                        ,
                    error: function(err) {
                        console.log('error')
                        Swal.fire('有欄位沒填寫')
                    }

                })
            } else {
                Swal.fire('已發放過了')
            }

        })





        function getValues(obj, key) {
            var objects = [];
            for (var i in obj) {
                if (!obj.hasOwnProperty(i)) continue;
                if (typeof obj[i] == 'object') {
                    objects = objects.concat(getValues(obj[i], key));
                } else if (i == key) {
                    objects.push(obj[i]);
                }
            }
            return objects;
        }
    </script>
@endsection
