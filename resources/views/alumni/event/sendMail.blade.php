@extends('alumni.master')
@push('styles')
    <link rel="stylesheet" href="{{URL::asset('alumni/css/parsley.css')}}">
    <style>
        body{
            overflow-x: hidden;
        }
        .hiddenable{
            display: flex;
        }
    </style>
@endpush
@section('content')

    <section class="mt-5 mb-5">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h2 class="bg-primary text-light p-3 text-center mb-5">Email Information</h2>
                    <form action="{{ route('event-send-mail-to-user')}}" method="POST" id="mail-form">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">To <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="email" value="{{$user->email}}" name="toMail" id="toMail"required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fromMail" class="col-2 col-form-label">From <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="email" name="fromMail" id="fromMail" value="{{env('MAIL_USERNAME')}}" required="required" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subject" class="col-2 col-form-label">Subject <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" value="{{old('subject')}}" type="text" name="subject" id="subject" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-2 col-form-label">Message <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <textarea name="message" id="message" class="form-control" cols="10" rows="10">Dear {{$user->name}}, </textarea>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <div class="col-md-12 text-center">
                                <input type="submit" value="Save Information" name="save" class="btn btn-primary btn-large p-3 pr-5 pl-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script src="{{URL::asset('alumni/js/parsley.min.js')}}"></script>
    <script>
        $('#mail-form').parsley();
    </script>
@endpush
