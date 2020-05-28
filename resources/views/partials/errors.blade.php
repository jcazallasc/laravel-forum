@if($errors->any())
    <div class="div alert alert-danger">
        <ul class="li list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif