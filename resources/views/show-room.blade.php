@extends('layouts.app')
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="row mt-5 g-3">
    <div class="col-md-2">
        <div class="card shadow">
            <div class="card-header">
                <h4>{{ $room->title }}</h4>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    users
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="card shadow">
            <div class="card-header">
                <h4>Messages</h4>
            </div>
            
            <livewire:chat.messages :messages="$messages" />

            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <textarea wire:model="text" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-secondary btn-block" type="submit"> Send </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
