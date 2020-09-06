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
                    <h2 class="bg-primary text-light p-3 text-center mb-5">Registration Information</h2>
                    <form action="{{ route('user-store') }}" method="POST" id="registration-form">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">Full Name <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}" required="required" data-parsley-length="[3, 40]">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="student_id" class="col-2 col-form-label">ID <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="{{old('unique_id')}}" name="unique_id" id="department_id" autocomplete="ON" required="required" data-parsley-length="[1, 40]">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-2 col-form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" value="{{old('email')}}" type="email" name="email" id="email" autocomplete="OFF" required="required" data-parsley-length="[4, 50]">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-2 col-form-label">Address <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" value="{{old('address')}}" type="text" name="address" id="address" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-2 col-form-label">Phone <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" value="{{old('phone')}}" type="text" name="phone" id="phone" autocomplete="OFF" required="required" data-parsley-length="[4, 15]">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role_id" class="col-2 col-form-label">User Type <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <select id="role_id" class="form-control" name="role_id" required="required">
                                    <option value="">Select User Type</option>
                                    <option value="3">Moderator</option>
                                    <option value="4">Alumni Student</option>
                                    <option value="5">Running Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row hiddenable">
                            <label for="batch" class="col-2 col-form-label">Batch</label>
                            <div class="col-10">
                                <input class="form-control" value="{{old('batch')}}" type="number" name="batch" id="batch" autocomplete="OFF">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-2 col-form-label">Department <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <select id="department" name="department_id" class="form-control" required="required">
                                    <option value="">Select Your Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" {{old('department_id') == $department->id ? 'selected':''}}>{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row hiddenable">
                            <label for="program" class="col-2 col-form-label">Program <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <select id="program" class="form-control" name="program">
                                    <option value="">Select Your Program</option>
                                    <option value="1" {{old('program') == 1 ? 'selected':''}}>Under Graduation</option>
                                    <option value="2" {{old('program') == 2 ? 'selected':''}}>Post Graduation</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-2 col-form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="password" name="password" id="password" required="required" data-parsley-length="[6, 40]">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-2 col-form-label">Re Password <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row hiddenable">
                            <label for="job" class="col-2 col-form-label">Job</label>
                            <div class="col-10">
                                <input class="form-control" value="{{old('job')}}" type="text" id="job" name="job" autocomplete="ON" placeholder="Job Title / NA">
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
        $('#registration-form').parsley();
    </script>
    <script>
        $("#role_id").on('change',function(){
            let role_id = ($('#role_id').val());
            if(role_id == 3){
                $(".hiddenable").css('display','none');
            }else if(role_id == 4 || role_id == 5){
                $(".hiddenable").css('display','flex');
            }else{
                $(".hiddenable").css('display','flex');
            }
        })
    </script>
@endpush
