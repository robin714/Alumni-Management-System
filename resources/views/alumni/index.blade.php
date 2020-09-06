@extends('alumni.master')
@push('styles')
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
@endpush
@section('content')
    <section>
        <div class="container-fluid pr-0 pl-0">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('alumni/img/transport.png')}}" alt="First slide" height="600px" width="100%" />
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('alumni/img/daffodil.jpg')}}" alt="Second slide" height="600px" />
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('alumni/img/maxresdefault.jpg')}}" alt="Third slide"  height="600px" />
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </section>

     <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Latest Events</button>
                        @foreach($data['event'] as $event)
                        <a href="{{ route('event.show',["id"=>$event->id])}}" class="list-group-item list-group-item-action">{{$event->title}}</a>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{url('all-event')}}" class="btn btn-success">Go All Events</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Latest Notice</button>

                        @foreach($data['notice'] as $notice)
                            <a href="{{ route('notice.show',["id"=>$notice->id])}}" class="list-group-item list-group-item-action">{{$notice->title}}</a>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{url('all-notice')}}" class="btn btn-success">Go All Notice</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
