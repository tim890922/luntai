@extends('layout.app')
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            系統功能</h1>
    </div>
    <div class="mx-auto py-3">
        <div class=" px-3 flex items-center justify-left w-full h-full text-3xl font-bold  bg-gray-400  rounded-lg"
            style="">
            員工管理
        </div>
    </div>
    <div class="w-auto h-auto px-3  flex justify-left items-center">
        <a href="/admin/employee">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5"
                style="">
                員工資料
            </div>
        </a>
    </div>
    <div class="mx-auto py-3">
        <div class=" px-3 flex items-center justify-left w-full h-full text-3xl font-bold  bg-gray-400  rounded-lg"
            style="">
            產品管理
        </div>
    </div>
    <div class="w-auto h-auto px-3  flex justify-left items-center">
        <a href="/admin/product">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                料號資料
            </div>
        </a>
        <a href="/admin/materialProduct">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                物料資料
            </div>
        </a>
        <a href="/admin/process">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                製程資料
            </div>
        </a>
        <a href="/admin/material">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                原物料資料
            </div>
        </a>
    </div>
    <div class="w-auto h-auto px-3 py-3 flex justify-left items-center">
        <a href="/admin/supplier">
                <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                    style="">
                    供應商資料
                </div>
        </a>
    </div>
    <div class="mx-auto py-3">
        <div class=" px-3 flex items-center justify-left w-full h-full text-3xl font-bold  bg-gray-400  rounded-lg"
            style="">
            訂單管理
        </div>
    </div>
    <div class="w-auto h-auto px-3  flex justify-left items-center">
        <a href="/admin/client">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                客戶資料
            </div>
        </a>
        <a href="/admin/order">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                訂單資料
            </div>
        </a>
    </div>
    <div class="mx-auto py-3">
        <div class=" px-3 flex items-center justify-left w-full h-full text-3xl font-bold  bg-gray-400  rounded-lg"
                style="">
                生產管理
        </div>
    </div>
    <div class="w-auto h-auto px-3  flex justify-left items-center">
        <a href="/admin/schedule">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                生產排程
            </div>
        </a>
        <a href="/admin/reportList">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                進度回報清單
            </div>
        </a>
        <a href="/admin/report">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                員工進度回報
            </div>
        </a>
        <a href="/admin/report">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                不良品管理
            </div>
        </a>
    </div>
    <div class="mx-auto py-3">
        <div class=" px-3 flex items-center justify-left w-full h-full text-3xl font-bold  bg-gray-400  rounded-lg"
                style="">
                倉儲管理
        </div>
    </div>
    <div class="w-auto h-auto px-3  flex justify-left items-center">
        <a href="/admin/productStorage/0">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                成品出庫
            </div>
        </a>
        <a href="/admin/productStorage/1">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                成品入庫
            </div>
        </a>
        <a href="/admin/productStorage">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                成品異動狀態清單
            </div>
        </a>
        <a href="/admin/materialChange/0">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                原物料出庫
            </div>
        </a>
    </div>
    <div class="w-auto h-auto px-3 py-3 flex justify-left items-center">
        <a href="/admin/materialChange/1">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                原物料入庫
            </div>
        </a>
        <a href="/admin/materialChange">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                原物料異動狀態清單
            </div>
        </a>
        <a href="/admin/materialChange">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5 "
                style="">
                料號檢核
            </div>
        </a>
    </div>
    <div class="mx-auto py-3">
        <div class=" px-3 flex items-center justify-left w-full h-full text-3xl font-bold  bg-gray-400  rounded-lg"
            style="">
            工作站管理
        </div>
    </div>
    <div class="w-auto h-auto px-3  flex justify-left items-center">
        <a href="/admin/workstation">
            <div class="flex items-center justify-center w-48 h-16 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 mx-5"
                style="">
                工作站資料
            </div>
        </a>
    </div>
@endsection
