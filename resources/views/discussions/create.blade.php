@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add discussion</div>

    <div class="card-body">
        @include('partials.errors')
        <form action="{{ route('discussions.store')}}" method="POST">
            @csrf 
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="hidden" id="content" name="content" value="{{ old('content') }}">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="channel_id">Channel</label>
                <select name="channel_id" id="channel_id" class="form-control">
                    @foreach ($channels as $channel)
                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create Discussions</button>
            </div>
        </form>    
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
