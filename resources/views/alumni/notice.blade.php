@extends('alumni.master')
@push('styles')
    <link rel="stylesheet" href="{{URL::asset('alumni/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('alumni/css/responsive.bootstrap4.min.css')}}">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
@endpush
@section('content')
    <section class="mt-5 mb-5">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">Notice List</h5>
                        <div class="card-body">
                            <table id="notice-list" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Attachment</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>152-15-6009</td>
                                        <td>Mahbubul Alam</td>
                                        <td>mahbubul@gmail.com</td>
                                        <td>Under Graduate</td>
                                        <td>01774-573275</td>
                                        <td>Application Developer</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>152-15-6109</td>
                                        <td>Nahid Hasan</td>
                                        <td>nahid@gmail.com</td>
                                        <td>Post Graduate</td>
                                        <td>01775-573275</td>
                                        <td>Plan Developer</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>152-15-6009</td>
                                        <td>Mahbubul Alam</td>
                                        <td>mahbubul@gmail.com</td>
                                        <td>Under Graduate</td>
                                        <td>01774-573275</td>
                                        <td>Application Developer</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>152-15-6109</td>
                                        <td>Nahid Hasan</td>
                                        <td>nahid@gmail.com</td>
                                        <td>Post Graduate</td>
                                        <td>01775-573275</td>
                                        <td>Plan Developer</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{URL::asset('alumni/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('alumni/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('alumni/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#event-list').DataTable();
        } );
    </script>
@endpush
