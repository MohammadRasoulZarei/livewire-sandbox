<div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if (session()->has('message'))
                <div class="alert {{ session('message')['class'] }}">{{ session('message')['message'] }}</div>
            @endif
        </div>
    </div>
    <div class="row">
        {{-- create --}}
        <div class="col-md-4 position-relative" style="border-right: 2px solid #80b4b4">
            <div class="spinner-grow position-absolute" style="top:50%;left:40%" wire:loading wire:target='editTask'
                style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div wire:loading wire:target='editTask' style="height: 100%;
            position: absolute;
            background: #6d53532b;
            width: 95%;
            z-index: 100000000;"></div>
            <h4>create task:</h4>
            <form wire:submit.prevent='{{ $edit ? 'updateTask' : 'createTask' }}'>
                <input type="hidden" wire:model.defer='task'>
                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input wire:model.defer='title' type="text" class="form-control">
                    @error('title')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea wire:model.defer='description' class="form-control" rows="4"></textarea>
                    @error('description')
                        <div class="form-text text-danger">{{ $message }}</div>
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
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">{{ $edit ? 'update' : 'create' }}
                        <div wire:loading wire:target='{{ $edit ? 'updateTask' : 'createTask' }}'
                            class="spinner-border spinner-border-sm" role="status">
                        </div>
                    </button>
                    @if ($edit)
                        <button type="button" wire:click="resetCreate" class="btn btn-warning btn-sm">cancel
                            <div wire:loading wire:target='resetCreate' class="spinner-border spinner-border-sm"
                                role="status">
                            </div>
                        </button>
                    @endif
                </div>
            </form>
        </div>
        {{-- end of create --}}
        {{-- start task table --}}
        <div class="col-md-8 pt-3">
            <form wire:submit.prevent="$refresh" class="row">
                <div class="col-auto">
                    <label for="">Title</label>
                    <input wire:model.defer='filterTitle' placeholder="title..." type="text" class="form-control">
                </div>
                <div class="col-auto">
                    <label for="">task status</label>
                    <select wire:model.defer='filterStatus' class="form-select">
                        <option value="">choose one ...</option>
                        <option value="published">published</option>
                        <option value="pending">pending</option>
                        <option value="expired">expired</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary btn-sm mt-4">filter</button>
                </div>
            </form>
            <button class="btn btn-primary btn-sm mt-4" wire:click="save" wire:confirm="are you sure?">confirm</button>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $key => $task)
                        <tr>
                            <th scope="row">{{ $tasks->firstItem() + $key }}</th>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->status }}</td>
                            <td>
                                <button class="btn btn-danger" wire:click="delete({{$task->id}})"> Delete </button>
                                {{-- <button class="btn btn-warning" wire:click="$dispatchTo('task.edit','showModalForm',{task:{{$task->id}}})"> Edit </button> --}}
                                <button class="btn btn-warning" wire:click="editTask({{ $task->id }})"> Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $tasks->render() }}
            </div>
        </div>
    </div>
    {{-- end task table --}}
    @livewire('task.edit')

</div>
@section('scripts')
    <script>
        Livewire.on('runEditModal', () => {
            const taskEditModal = new bootstrap.Modal('#taskEdit');
            taskEditModal.show();
        })
    </script>
@endsection
