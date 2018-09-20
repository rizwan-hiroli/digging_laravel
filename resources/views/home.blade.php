@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!</br>
                     <a href="{{URL::asset('send_mail')}}" class="btn btn-primary rounded-s " id="addbutton"><i class="fa fa-envelope"></i>  Send Mail </a>
                     <a href="{{URL::asset('send_notification')}}" class="btn btn-primary rounded-s " id="addbutton"><i class="fa fa-bell-o"></i>  Send Notification </a>

                     <a href="{{URL::asset('read_notification')}}" class="btn btn-primary rounded-s " id="addbutton"><i class="fa fa-calendar-o"></i>  Read Notification </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
