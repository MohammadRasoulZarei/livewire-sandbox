<div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            @if (session()->has('message'))
                <div class="alert {{session('message')['class'] }}">{{ session('message')['message'] }}</div>
            @endif
        </div>
    </div>
    <div class="row">
        {{-- create --}}
        <div class="col-md-4">
            <h4>create task:</h4>
            <form wire:submit.prevent='save'>
                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input wire:model.defer='title' type="text" class="form-control">
                    @error('title')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea wire:model.defer='description' class="form-control" rows="4"></textarea>
                    @error('description')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">task status</label>
                    <select wire:model.defer='status' class="form-select">
                        <option value="">choose one ...</option>
                        <option value="published">published</option>
                        <option value="pending">pending</option>
                        <option value="expired">expired</option>
                    </select>
                    @error('status')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">create
                        <div wire:loading wire:target='save' class="spinner-border spinner-border-sm" role="status">
                        </div>
                    </button>
                </div>
            </form>
        </div>
        {{-- end of create --}}
        {{-- start task table --}}
        <div class="col-md-8">task table</div>
        {{-- end task table --}}
    </div>
</div>
