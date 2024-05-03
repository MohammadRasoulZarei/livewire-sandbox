<div class="card col-md-4 offset-4 mt-5 shadow rounded">

    <div class="card-body">
        @error('message')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>message:</strong> {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          @enderror
        @if ($showLoginView)
        <h4 class="text-center my-4">login</h4>
        <form wire:submit.prevent="login">
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input wire:model.defer="loginEmail" type="email" class="form-control">
                @error('loginEmail')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input wire:model.defer="loginPassword" type="password" class="form-control">
                @error('loginPassword')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">remember me</label>
                <input wire:model.defer="remember" type="checkbox" style="width: 20px;height:20px
                ;cursor: pointer;">
            </div>
            <button type="submit" class="btn btn-dark">
                login
                <div wire:loading wire:target="login">
                    <div class="spinner-border spinner-border-sm"></div>
                </div>
            </button>
        </form>
        <div class="text-center text-black mt-2">
            <span wire:click="showRegister" class="badge text-black" style="cursor: pointer">create an account?</span>
        </div>
        {{-- end of login --}}
        @else
            <h4 class="text-center my-4">register</h4>
            <form wire:submit.prevent="register" class="pb-3">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input wire:model.defer="name" type="text" class="form-control">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input wire:model.defer="email" type="email" class="form-control">
                    @error('email')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input wire:model.defer="password" type="password" class="form-control">
                    @error('password')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input wire:model.defer="passwordConfirm" type="password" class="form-control">
                    @error('passwordConfirm')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark">
                    Register
                    <div wire:loading wire:target="register">
                        <div class="spinner-border spinner-border-sm"></div>
                    </div>
                </button>
            </form>
        @endif
    </div>
</div>
