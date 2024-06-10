   <div class="card-body" style="height: 300px;overflow-y: auto;">
        @foreach ($messages as $message)
            <div class="mb-3 pb-2 border-bottom">
                <div>
                    <strong>{{ $message->user->name }} :</strong>
                    <span class="ms-2">{{ $message->created_at }}</span>
                </div>
                <div class="ms-2 my-2">{{ $message->text }}</div>
            </div>
        @endforeach
    </div>

