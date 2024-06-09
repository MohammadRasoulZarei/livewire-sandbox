<div class='row mt-5'>
    <div class="col-md-6 offset-3">
        <h4>create product:</h4>
        <form wire:submit.prevent='{{ $edit ? 'updateProduct' : 'createProduct' }}'>
            <div class="form-group mb-3">
                <label for="">Title</label>
                <input wire:model='title' type="text" class="form-control">
                @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">Description</label>
                <textarea wire:model='description' class="form-control" rows="4"></textarea>
                @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">Product price</label>
                <input type="text" wire:model='price' class="form-control">
                @error('price')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">image</label>
                <input class="form-control" wire:model.live='image' type="file" id="formFile">
                @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <div wire:loading wire:target="image">uploading</div>
            </div>
            @if ($image)
                <div class="my-3">
                    <img src="{{$image->temporaryUrl()}}" width="150" alt="">
                </div>
            @endif
            <div class="form-group">
                <button class="btn btn-primary btn-sm">{{ $edit ? 'update' : 'create' }}
                    <div wire:loading wire:target='{{ $edit ? 'updateProduct' : 'createProduct' }}'
                        class="spinner-border spinner-border-sm" role="status">
                    </div>
                </button>
                {{-- @if ($edit)
                    <button type="button" wire:click="resetCreate" class="btn btn-warning btn-sm">cancel
                        <div wire:loading wire:target='resetCreate' class="spinner-border spinner-border-sm"
                            role="status">
                        </div>
                    </button>
                @endif --}}
            </div>
        </form>
    </div>
</div>
