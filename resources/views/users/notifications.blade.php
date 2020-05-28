@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Notifications</div>
    <div class="card-body">
        <ul class="list-group">
            @forelse ($notifications as $notification)
                <li class="list-group-item">
                    {{ $notification->data['message'] }}
                    <a href="{{ $notification->data['link'] }}" class="float-right btn btn-sm btn-primary">{{ $notification->data['linkText'] }}</a>
                </li>
            @empty
                <h3 class="text-center font-weight-bold"> No notifications yet</h3>
            @endforelse
        </ul>
        {{ $notifications->links() }}
    </div>
</div>
@endsection