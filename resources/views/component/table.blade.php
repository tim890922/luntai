<table id="table_1" class="my-4 hover">
    <thead >
        <tr>
            @foreach ($col as $c)
                <td>{{ $c }}</td>
            @endforeach
            <td>刪除</td>
            <td>編輯</td>
        </tr>
    </thead>
    <tbody>

        @foreach ($row as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->client }}</td>
                <td>{{ $r->product_name }}</td>
                <td>{{ $r->material }}</td>
                <td>{{ $r->price }}</td>
                <td>{{ $r->weight }}</td>
                <td>{{ $r->tonnes }}</td>
                <td><button class="px-1 bg-red-500 rounded hover:bg-red-700">刪除</button></td>
                <td><button class="px-1 bg-blue-500 rounded hover:bg-blue-700">編輯</button></td>
            </tr>
        @endforeach

    </tbody>
</table>
