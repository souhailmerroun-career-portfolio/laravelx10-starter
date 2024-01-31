@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notifications</h1>

        @if ($notifications->isEmpty())
            <p>No new notifications.</p>
        @else
            <ul class="list-group">
                @foreach ($notifications as $notification)
                    <li class="list-group-item">
                        <strong>{{ $notification->type ?? 'Notification' }}</strong>
                        <p>{{ $notification->data['message'] }}</p>
                        <small>{{ $notification->created_at->diffForHumans() }}</small>

                        @if (isset($notification->data['url']))
                            <a href="{{ $notification->data['url'] }}">View</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
