<div>
    @for($i = 1; $i <= $pages; $i++) <?php 
            $is_show = false;
            if($i == 1 || $i == $pages) {
                $is_show = true;
            } else if ($i > ($page_id - 3) && $i < ($page_id + 3)) {
                $is_show = true;
            } 
            if (($i == 2 || $i == ($pages -1)) && !$is_show) {
                echo "...";
            }
        ?> @if ($is_show) @include('product.pagination', ['i'=> $i])
        @endif




        {{-- @include('product.pagination', ['i' => $i]) --}}
        @endfor
</div>



<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Option</th>
    </tr>
    @foreach ($products as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->amount}}</td>
        <td>
            <ul>
                <li><a href="{{route('product.edit', ['id' => $item->id ])}}">Edit</a></li>
                <li>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Remove
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form method="POST" action="{{ route('product.remove', ['id' => $item->id])}}"">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type=" submit" class="btn btn-secondary">Confirm</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </td>
    </tr>
    @endforeach



</table>