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
                    <h2 class="bg-primary text-light p-3 text-center mb-5">Notice Information</h2>
                    <form action="{{ route('notice.store') }}" method="POST" id="notice-form">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">Title <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}" required="required" data-parsley-length="[3, 40]">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-2 col-form-label">Description <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <textarea name="description" id="description" class="form-control" cols="10" rows="10">{{old('description')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-2 col-form-label">Department <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <select id="department" name="department_id" class="form-control">
                                    @foreach($departments as $department)
                                    <option value="{{$department->id}}" {{old('department_id') == $department->id ? 'selected':''}}>{{$department->name}}</option>
                                    @endforeach
                                </select>
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
        $('#notice-form').parsley();
    </script>
@endpush
