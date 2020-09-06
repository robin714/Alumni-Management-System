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
                    <h2 class="bg-primary text-light p-3 text-center mb-5">Contact Information</h2>
                    <form action="{{ url('user/update/'.$user->id) }}" method="POST" id="registration-form">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">Full Name <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" required="required" data-parsley-length="[3, 40]" {{Auth::user()->role_id > 2 ? 'disabled':''}}>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="student_id" class="col-2 col-form-label">ID <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="{{$user->unique_id}}" name="unique_id" id="unique_id" autocomplete="ON" required="required" data-parsley-length="[1, 40]" {{Auth::user()->role_id > 2 ? 'disabled':''}}>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-2 col-form-label">Address <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" value="{{$user->address}}" type="text" name="address" id="address" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-2 col-form-label">Phone <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" value="{{$user->phone}}" type="text" name="phone" id="phone" autocomplete="OFF" required="required" data-parsley-length="[4, 15]">
                            </div>
                        </div>
                        @if(Auth::user()->role_id != 1)
                            <div class="form-group row">
                                <label for="department_id" class="col-2 col-form-label">Department <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <select id="department_id" name="department_id" class="form-control" required="required" {{Auth::user()->role_id > 2 ? 'disabled':''}}>
                                        <option value="">Select Your Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" {{$user->department_id == $department->id ? 'selected':''}}>{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if(Auth::user()->role_id > 3)
                            <div class="form-group row">
                                <label for="program" class="col-2 col-form-label">Program <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <select id="program" class="form-control" name="program" {{Auth::user()->role_id > 2 ? 'disabled':''}}>
                                        <option value="">Select Your Program</option>
                                        <option value="1" {{$user->program == 1 ? 'selected':''}}>Under Graduation</option>
                                        <option value="2" {{$user->program == 2 ? 'selected':''}}>Post Graduation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="batch" class="col-2 col-form-label">Batch</label>
                                <div class="col-10">
                                    <input class="form-control" value="{{$user->batch}}" type="number" name="batch" id="batch" autocomplete="OFF" {{Auth::user()->role_id > 2 ? 'disabled':''}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="job" class="col-2 col-form-label">Job</label>
                                <div class="col-10">
                                    <input class="form-control" value="{{$user->job}}" type="text" id="job" name="job" autocomplete="ON" placeholder="Job Title / NA">
                                </div>
                            </div>
                            @endif
                        @endif
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
        $('#registration-form').parsley();
    </script>
@endpush
