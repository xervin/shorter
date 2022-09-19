@if ($errors->any())
    <div class="alert alert__danger">
        <ul class="alert-list alert__danger-list">
            @foreach ($errors->all() as $error)
                <li class="alert-item alert__danger-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
