@extends('frontend.layouts.app')

@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center pb-2">
                    <h1 class="">Notifications</h1>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="topics-section section-padding pb-0 mb-5" id="section_3">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Notifications</h4>
                </div>
            </div>

            <div class="col-lg-12 col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Notification</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notifications as $notification)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a href="{{ route('notification.show', $notification->id) }}">{{ $notification->data['data']['name']}} - @if($notification->data['role'] == 'createroom') Just Created Research Room @endif</a>
                                    <br>
                                    Go to Room -> <a href="{{ route('room.show', $notification->data['data']['room_id'])}}">{{ $notification->data['data']['room_name'] }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('notification.show', $notification->id) }}">
                                        @if($notification->read_at == null)
                                        Unread
                                        @else
                                        Read
                                        @endif
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </div>
</section>

@endsection