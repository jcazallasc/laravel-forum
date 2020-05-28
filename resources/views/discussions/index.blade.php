@extends('layouts.app')

@section('content')
@foreach ($discussions as $discussion)
    <div class="card mb-3">
        @include('partials.discussions.header')

        <div class="card-body">
            <h3 class="text-center font-weight-bold">{{ $discussion->title }}</h3>
        </div>
    </div>
@endforeach
{{ $discussions->links() }}
@endsection
