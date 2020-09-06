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
                        <form action="{{url('search-people')}}" role="search" method="post">
                            @csrf
                            <div class="form-group-stylish row">
                                <div class="col-sm-2"></div>   
                                <div class="col-sm-6">
                                    <input type="text" name="query" class="form-control" placeholder="Enter name or email or id">
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary" type="submit" style="max-width: 120px;">Search</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section class="mt-5 mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="list-group">
                        @if(isset($users))
                        @forelse($users as $user)
                            <a href="{{ route('user-view',["id"=>$user->id])}}" class="list-group-item list-group-item-action">Name: {{$user->name}}, ID: {{$user->unique_id}}</a>
                            @empty
                            <h3>No data found</h3>
                        @endforelse
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
