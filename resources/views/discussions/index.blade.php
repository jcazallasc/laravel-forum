@extends('layouts.app')

@section('content')
@forelse ($discussions as $discussion)
    <div class="card mb-3">
        @include('partials.discussions.header')

        <div class="card-body">
            <h3 class="text-center font-weight-bold">{{ $discussion->title }}</h3>
        </div>
    </div>
@empty
    <h3 class="text-center font-weight-bold pt-5">No discussions found</h3> 
@endforelse
{{ $discussions->appends(['channel' => request()->query('channel')])->links() }}
@endsection
