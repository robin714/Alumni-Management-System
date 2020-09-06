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
                        <button type="button" class="list-group-item list-group-item-action active">Latest Notice</button>

                        @foreach($notices as $notice)
                            <a href="{{ route('notice.show',["id"=>$notice->id])}}" class="list-group-item list-group-item-action">{{$notice->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{$notices->links()}}
        </div>
    </section>

@endsection
