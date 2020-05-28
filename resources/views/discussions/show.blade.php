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
@endsection
