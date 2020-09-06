@extends('alumni.master')
@push('styles')
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
@endpush
@section('content')
     <section class="mt-5 mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Latest Events</button>
                        @foreach($events as $event)
                        <a href="{{ route('event.show',["id"=>$event->id])}}" class="list-group-item list-group-item-action">{{$event->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{$events->links()}}
        </div>
    </section>

@endsection
