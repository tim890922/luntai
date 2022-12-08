@extends('layout.app')
@section('style')
    <style>

    </style>
@endsection
@section('side')
    @include('component.side')
@endsection
@section('main')
    <div class="mx-auto ">
        <h1
            class="flex items-center justify-center w-full h-full text-4xl font-bold bg-green-300 border-b-8 border-l-4 border-green-600 rounded-lg">
            系統功能</h1>
    </div>
    <div class="w-1/4 px-3 mt-3 text-xl bg-blue-200 rounded">
        <p> 
            你好，{{$user->name}}
        </p>
    </div>

    <div class="py-3 mx-auto">
        <div class="flex items-center w-full h-full px-3 text-3xl font-bold bg-gray-400 rounded-lg justify-left"
            style="">
            員工管理
        </div>
    </div>
    <div class="flex items-center w-auto h-auto px-3 justify-left">
        <a href="/admin/employee">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500"
                style="">
                員工資料
            </div>
        </a>
    </div>
    <div class="py-3 mx-auto">
        <div class="flex items-center w-full h-full px-3 text-3xl font-bold bg-gray-400 rounded-lg justify-left"
            style="">
            產品管理
        </div>
    </div>
    <div class="flex items-center w-auto h-auto px-3 justify-left">
        <a href="/admin/product">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                料號資料
        </a>
    </div>

    <a href="/admin/materialProduct">
        <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
            style="">
            BOM表
        </div>
    </a>
    <a href="/admin/process">
        <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
            style="">
            製程資料
        </div>
    </a>
    <a href="/admin/material">
        <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
            style="">
            原物料資料
        </div>
    </a>
    <a href="/admin/supplier">
        <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
        style="">
            供應商資料
        </div>
    </a>
    </div>
    
    <div class="py-3 mx-auto">
        <div class="flex items-center w-full h-full px-3 text-3xl font-bold bg-gray-400 rounded-lg justify-left"
            style="">
            訂單管理
        </div>
    </div>
    <div class="flex items-center w-auto h-auto px-3 justify-left">
        <a href="/admin/client">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                客戶資料
            </div>
        </a>
        <a href="/admin/order">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                訂單資料
            </div>
        </a>
    </div>
    <div class="py-3 mx-auto">
        <div class="flex items-center w-full h-full px-3 text-3xl font-bold bg-gray-400 rounded-lg justify-left"
            style="">
            生產管理
        </div>
    </div>
    <div class="flex items-center w-auto h-auto px-3 justify-left">
        <a href="/admin/schedule">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                生產排程
            </div>
        </a>
        <a href="/admin/schedule/list">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                排程清單
            </div>
        </a>
        <a href="/admin/report">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                進度回報
            </div>
        </a>
        <a href="/admin/reportList">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                回報清單
            </div>
        </a>
        <a href="/admin/defectiveReport">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                不良品管理
            </div>
        </a>
    </div>
    <div class="py-3 mx-auto">
        <div class="flex items-center w-full h-full px-3 text-3xl font-bold bg-gray-400 rounded-lg justify-left"
            style="">
            倉儲管理
        </div>
    </div>
    <div class="flex items-center w-auto h-auto px-3 justify-left">
        <a href="/admin/productStorage/0">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                成品出庫
            </div>
        </a>
        <a href="/admin/productStorage/1">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                成品入庫
            </div>
        </a>
        <a href="/admin/productStorage">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                成品異動狀態清單
            </div>
        </a>
        <a href="/admin/productStoratge/List">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                成品庫存清單
            </div>
        </a>
         <a href="/admin/check">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                料號檢核
            </div>
        </a> 
    </div>
    <div class="flex items-center w-auto h-auto px-3 py-3 justify-left">
        <a href="/admin/materialChange/0">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                原物料出庫
            </div>
        </a>
        <a href="/admin/materialChange/1">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                原物料入庫
            </div>
        </a>
        <a href="/admin/materialChange">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                原物料異動狀態清單
            </div>
        </a>
        <a href="/admin/materialStorage/List">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500 "
                style="">
                原物料庫存清單
            </div>
        </a>
    </div>
    <div class="py-3 mx-auto">
        <div class="flex items-center w-full h-full px-3 text-3xl font-bold bg-gray-400 rounded-lg justify-left"
            style="">
            工作站管理
        </div>
    </div>
    <div class="flex items-center w-auto h-auto px-3 justify-left">
        <a href="/admin/workstation">
            <div class="flex items-center justify-center w-48 h-16 mx-5 text-xl font-bold text-black bg-blue-400 border-b-8 border-l-4 border-blue-700 rounded cursor-pointer hover:bg-blue-300 hover:border-blue-500"
                style="">
                工作站資料
            </div>
        </a>
    </div>
@endsection
@section('script')
   
@endsection
