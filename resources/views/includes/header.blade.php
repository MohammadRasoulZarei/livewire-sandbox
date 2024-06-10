<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">livewwire</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('task')}}">tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('product.index')}}">products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('chat.index')}}">chat</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    {{-- @livewire('product.cartIcon') --}}
                    <livewire:product.cartIcon @refresh-cartIcon="$refresh">
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="#">{{auth()->user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">logout</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">login</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
