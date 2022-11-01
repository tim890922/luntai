<div id="{{ $id }}" class="modal">

    <!-- Modal content -->
    <div class="rounded modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2 class="text-xl ">{{ $header }}</h2>
        </div>
        <div class="modal-body">
            <form action="{{ $action }}" method="POST">
                @csrf
                @isset($method)
                    @method($method)
                @endisset
                <table class="mx-auto text-xl">
                    @isset($body)
                        @foreach ($body as $index => $row)
                            <tr>
                                @isset($row['lable'])
                                    <td class="text-right ">{{ $row['lable'] }}</td>
                                @endisset
                                <td class="px-3 py-2">
                                    @switch($row['tag'])
                                        @case('input')
                                            @include('component.input', $row)
                                            @if ($errors->has($row['name']))
                                                <p style="color:red" class="text-base ">請填寫此項目</p>
                                            @endif
                                        @break

                                        @case('select')
                                            @include('component.select', [
                                                'lists' => $row['lists'],
                                                'name' => $row['name'],
                                            ])
                                        @break
                                    @endswitch

                                </td>
                            </tr>
                        @endforeach
                    @endisset

                </table>
                <div class="flex w-1/2 mx-auto my-3 mt-10 center">
                    <Button type="submit" class="px-3 m-auto bg-gray-300 rounded hover:bg-gray-500">送出</Button>
                    <button type="reset" class="px-3 m-auto bg-red-300 rounded hover:bg-red-500">重置</button>
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <h3>Modal Footer</h3>
        </div>
    </div>

</div>
<script>
    // Get the modal
    function modal() {
        let modal = document.getElementById("{{ $id }}");
        // Get the button that opens the modal
        let btn = document.getElementById("{{ $btn }}");
        // Get the <span> element that closes the modal
        let span = document.getElementsByClassName("close")[0];
        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        };
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        };
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    }
</script>
