<div class="row mt-5 g-3">
    <div>
        <a href="{{ route('product.create') }}" class="btn btn-dark">Create Product</a>
    </div>
    @foreach ($products as $product)
        <div class="col-md-3">
            <div class="card-group">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top " style="height: 200px"
                        src="{{ asset('storage/products/' . $product->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text" style="height: 120px; overflow: auto">{{ $product->description }}</p>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between">

                        <button wire:loading.attr="disabled" wire:click="addToCart({{ $product->id }})" class="btn btn-sm btn-outline-success">add
                            to cart
                            <div class="spinner-border spinner-border-sm" wire:loading wire:target="addToCart({{ $product->id }})" role="status">
                                {{-- <span class="sr-only">Loading...</span> --}}
                            </div>
                        </button>
                        {{ number_format($product->price) }}

                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
