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
            
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->client }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->material }}</td>
                    <td>{{ $product->weight }}</td>
                    <td>{{ $product->tonnes }}</td>
                </tr>
                @endforeach


            
        </table>

    </div>
@endsection
