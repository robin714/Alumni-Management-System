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
                        <div class="card-header row">
                            <div class="col-md-6 text-left">
                                <h5>Event List</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('event.create')}}" class="btn btn-primary">Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="event-list" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Attendee Name</th>
                                        <th>Status</th>
                                        <th>Applied</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$event->user->name}}</td>
                                        <td>{{strtoupper($event->action)}}</td>
                                        <td>{{$event->created_at}}</td>
                                        <td>
                                            <select id="{{$event->user->id}}-{{$event->event_id}}"  class="btn btn-primary action">
                                                <option value="">Select Action</option>
                                                <option value="view">View User</option>
                                                <option value="send-mail">Send Email for not going</option>
                                                <option value="send-mail-for-going">Send Email for going</option>
                                                <option value="send-mail-for-maybe">Send Email for maybe</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
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
    <script src="{{URL::asset('alumni/js/sweetalert.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#event-list').DataTable();
        } );
    </script>
    <script>
        $(".action").on('click',function () {
            let ids = $(this).attr('id');
            let action = $(this).val();
            const _token = document.head.querySelector("[property=csrf-token]").content;
            switch (action) {
                case "view":
                    viewEvent(ids);
                    break;

                case "send-mail":

                    sendEmail(ids);
                    break;

                default :
                    //toastr.error("Invalid Setting type", "Server Notification");
                    break;
            }

            function viewEvent(ids) {
                //let ids = $("mail").val();
                let newId = ids.split("-");
                let id = newId[0];
                window.open('{{ route('user-view',["id"=>'::id'])}}'.replace('::id', id),'_blank');
            }

            function sendEmail(ids) {
                window.open('{{ route('event-send-mail',["ids"=>'::ids'])}}'.replace('::ids', ids),'_blank');
            }
        })
    </script>
@endpush
