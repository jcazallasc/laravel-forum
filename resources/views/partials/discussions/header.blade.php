<div class="card-header">
    <div class="d-flex justify-content-between">
        <div>
            <img src="{{ Gravatar::src($discussion->author->email) }}" alt="{{ $discussion->author->name }}" class="mr-2 rounded-circle w-25"/>
            <h5 class="d-inline font-weight-bold">{{ $discussion->author->name }}</h5>
        </div>
        <div>
            <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-success btn-sm">View</a>
        </div>
    </div>
</div>