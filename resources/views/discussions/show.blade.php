@extends('layouts.app')

@section('content')
<div class="card">
    @include('partials.discussions.header')

    <div class="card-body">
        <h3 class="text-center font-weight-bold">{{ $discussion->title }}</h3>
        <hr>
        {!! $discussion->content !!}
    </div>
</div>

@foreach ($discussion->replies()->paginate(env('ITEMS_PER_PAGE')) as $index => $reply)
    <div class="card my-5">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="{{ Gravatar::src($reply->owner->email) }}" alt="{{ $reply->owner->name }}" class="rounded-circle w-25 mr-2"/>
                    <span>{{ $reply->owner->name }}</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! $reply->content !!}
        </div>
    </div>
@endforeach
{{ $discussion->replies()->paginate(env('ITEMS_PER_PAGE'))->links() }}

<div class="card my-5">
    <div class="card-header">Add a reply</div>

    <div class="card-body">
        @auth
            @include('partials.errors')
            <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
                @csrf 
                <div class="form-group">
                    <input type="hidden" id="content" name="content" value="{{ old('content') }}">
                    <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-success">Add reply</button>
                </div>
            </form> 
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-block">Sign in to add a reply</a>
        @endauth
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
