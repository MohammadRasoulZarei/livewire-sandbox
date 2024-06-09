<div class="row mt-5">
    <div class="col-lg-12 pl-3 pt-3">
        <table class="table table-hover border bg-white">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th style="width:10%;">Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (\Cart::getContent()->sort() as $item)
                    <tr>
                        <td class="align-middle">
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="{{ asset('/storage/products/' . $item->associatedModel->image) }}"
                                        alt="..." class="img-fluid" />
                                </div>
                                <div class="col-lg-10">
                                    <h4>{{ $item->name }}</h4>
                                    <p>{{ $item->associatedModel->description }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle"> {{ number_format($item->price) }} </td>
                        <td class="align-middle">
                            <button wire:click="changeCount({{$item->id}},+1)" class="btn btn-sm btn-dark me-2">
                                +
                            </button>

                            <span>{{ $item->quantity }}</span>

                            <button wire:click="changeCount({{$item->id}},-1)" class="btn btn-sm btn-dark ms-2">
                                -
                            </button>
                        </td>
                        <td class="align-middle"> {{ number_format($item->price * $item->quantity) }} </td>
                        <td class="align-middle" style="width:15%;">
                            <button wire:click="delete({{$item->id}})" class="btn btn-danger btn-sm">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <a href="#" class="btn btn-dark">Clear Cart</a>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center" style="width:15%;"><strong>Total :
                            {{ number_format(\Cart::getTotal()) }}</strong></td>
                    <td><a href="#" class="btn btn-success btn-block">Checkout</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
