@extends('layout.app')

@section('main')
    <div>
        <p class=" bg-gray-500 my-5 container mx-auto text-center text-xl">這是料號清單</p>
    </div>
    <div>
        <table class=" m">
            <tr>
                <th class="mr-3">料號</th>
                <th class="mr-3">名稱</th>
                <th class="mr-3">客戶</th>
                <th class="mr-3">材料單價</th>
                <th class="mr-3">材質</th>
                <th class="mr-3">單重</th>
                <th class="mr-3">射出噸數</th>
            </tr>
            <tr>
                <td>{{ $products->id }}</td>
                <td>{{ $products->name }}</td>
                <td>{{ $products->client }}</td>
                <td>{{ $products->price }}</td>
                <td>{{ $products->material }}</td>
                <td>{{ $products->weight }}</td>
                <td>{{ $products->tonnes }}</td>
                
            </tr>
        </table>

    </div>
@endsection
