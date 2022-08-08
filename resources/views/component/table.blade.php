<table id="table_1" class="my-4 hover">
    <thead>
        <tr>
            @foreach ($col as $c)
                <td>{{ $c }}</td>
            @endforeach
        </tr>
    </thead>
    <tbody>

        @foreach ($row as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->client }}</td>
                <td>{{ $r->product_name}}</td>
                <td>{{ $r->material}}</td>
                <td>{{ $r->price }}</td>
                <td>{{ $r->weight }}</td>
                <td>{{ $r->tonnes}}</td>
            </tr>
        @endforeach

    </tbody>
</table>
