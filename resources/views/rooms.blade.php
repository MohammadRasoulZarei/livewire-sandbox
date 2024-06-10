@extends('layouts.app')
@section('style')
<style>
    .list-group-item:hover{
        background: #eee;
    }
</style>
@endsection
@section('content')
<div class="row mt-5">
    <div class="col-sm-4 col-md-3 mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h4>Rooms</h4>
            </div>
            <div class="list-group list-group-flush">
                @foreach ($rooms as $room)
                    <a class="list-group-item" href="{{ route('showRoom' , ['room' => $room->slug]) }}">{{ $room->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
