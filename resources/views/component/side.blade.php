<div class="w-1/5 h-auto px-4 py-3 my-4 bg-gray-200">
    <h1 class="text-2xl font-bold text-left">系統選單</h1>
    <div class="ml-3 myTextBox">
        <!--

        <ul class="text-xl text-left ">
            <li onclick="toggleMenu();" class="block cursor-pointer"><p class="font-bold ">資料處理</p>
                <ul class="ml-5 child hide" id="a1">
                    <li class="my-1 border-b-2 border-gray-500"><a href="/admin/order"
                            class="block hover:text-blue-600">訂單清單</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="/admin/product"
                            class="block hover:text-blue-600">料號清單</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="/admin/machine"
                            class="block hover:text-blue-600">機台清單</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="/admin/employee"
                            class="block hover:text-blue-600">員工清單</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="/admin/material"
                            class="block hover:text-blue-600">原物料清單</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="/admin/client"
                            class="block hover:text-blue-600">客戶清單(新增有問題)</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="/admin/supplier"
                            class="block hover:text-blue-600">原物料供應商清單(新增有問題)</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="/admin/machineProduct"
                            class="block hover:text-blue-600">排機清單</a></li>
                    <li class="my-1 border-b-2 border-gray-500"><a href="/admin/workstation"
                            class="block hover:text-blue-600">工作站清單</a></li>
                    {{-- <li class="my-1 border-b-2 border-gray-500"><a href="/admin/process"
                            class="block hover:text-blue-600">製程清單</a></li> --}}
                </ul>
            <li class="parent"><p class="font-bold ">系統功能(未完成 )</p>
                <ul class="ml-5 ">
                    <li class="my-1 border-b-2 border-gray-500">生產排程</li>
                    <li class="my-1 border-b-2 border-gray-500">訂單管理</li>
                    <li class="my-1 border-b-2 border-gray-500">進度回報系統</li>
                    <li class="my-1 border-b-2 border-gray-500">倉儲管理</li>
                </ul>
            </li>
            </li>




        </ul>
-->

        <ul class="cursor-pointer ">

            <p class="my-2 text-xl font-bold border-b-2 border-gray-500 accordion">
                員工管理</p>
            <ul class="hidden pl-5 text-xl font-thin">
                <li>
                    <a href="/admin/employee" class="block hover:text-blue-600">員工資料</a>
                </li>
            </ul>

            <p class="my-2 text-xl font-bold border-b-2 border-gray-500 accordion">
                產品管理
            </p>
            <ul class="hidden pl-5 text-xl font-thin">
                <li>
                    <a href="/admin/product" class="block hover:text-blue-600">料號資料</a>
                </li>
                <li>
                    <a href="/admin/materialProduct" class="block hover:text-blue-600">
                        BOM表
                    </a>
                </li>
                <li>
                    <a href="/admin/process" class="block hover:text-blue-600">
                        製程資料
                    </a>
                </li>
                <li>
                    <a href="/admin/material" class="block hover:text-blue-600">原物料資料</a>
                    <ul class="pl-5 ">
                        <li>
                            <a href="/admin/supplier" class="block hover:text-blue-600">供應商</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <p class="block my-2 text-xl font-bold border-b-2 border-gray-500 accordion">
                訂單管理
            </p>
            <ul class="hidden pl-5 text-xl font-thin">
                <li>
                    <a href="/admin/client" class="block hover:text-blue-600">客戶資料</a>
                </li>
                <li>
                    <a href="/admin/order" class="block hover:text-blue-600">訂單資料</a>
                </li>
            </ul>


            <p class="my-2 text-xl font-bold border-b-2 border-gray-500 accordion">
                生產管理
            </p>
            <ul class="hidden pl-5 text-xl font-thin">
                <li>
                    <a href="/admin/schedule" class="block hover:text-blue-600">生產排程</a>
                </li>
                <li>
                    <a href="/admin/reportList" class="block hover:text-blue-600">進度回報清單</a>
                </li>
                <li>
                    <a href="/admin/report" class="block hover:text-blue-600">員工進度回報</a>
                </li>
                <li>
                    <a href="/admin/defectiveReport" class="block hover:text-blue-600">不良品管理</a>
                </li>
            </ul>


            <p class="my-2 text-xl font-bold border-b-2 border-gray-500 accordion">
                倉儲管理
            </p>
            <ul class="hidden pl-5 text-xl font-thin">
                <li>成品
                    <ul class="pl-5">
                        <li>
                            <a href="/admin/productStorage/0" class="block hover:text-blue-600">
                                出庫
                            </a>
                        </li>
                        <li>
                            <a href="/admin/productStorage/1" class="block hover:text-blue-600">
                                入庫
                            </a>
                        </li>
                        <li>
                            <a href="/admin/productStorage" class="block hover:text-blue-600">
                                異動狀態清單
                            </a>
                        </li>
                    </ul>
                </li>

                <li>原物料
                    <ul class="pl-5">
                        <li>
                            <a href="/admin/materialChange/0" class="block hover:text-blue-600">
                                出庫
                            </a>
                        </li>
                        <li>
                            <a href="/admin/materialChange/1" class="block hover:text-blue-600">
                                入庫
                            </a>
                        </li>
                        <li>
                            <a href="/admin/materialChange" class="block hover:text-blue-600">
                                異動狀態清單
                                <a>
                        </li>
                    </ul>
                </li>

                <li><a href="/admin/client" class="block hover:text-blue-600">料號檢核</a></li>
            </ul>


            <p class="my-2 text-xl font-bold border-b-2 border-gray-500 accordion">
                工作站管理
            </p>
            <ul class="hidden pl-5 text-xl font-thin">
                <li>
                    <a href="/admin/workstation" class="block hover:text-blue-600">工作站資料</a>
                </li>
                <!-- <li>
                    <a href="/admin/machineProduct"class="block hover:text-blue-600">排機資料</a>
                </li> -->
            </ul>
            </li>






        </ul>


    </div>
</div>


<style>
</style>
