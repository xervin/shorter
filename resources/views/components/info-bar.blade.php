@if ($errors->any())
    <div class="alert alert__danger">
        <ul class="alert-list alert__danger-list">
            @foreach ($errors->all() as $error)
                <li class="alert-item alert__danger-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (isset($info) && !empty($info))
    <div class="alert alert__info">
        <ul class="alert-list alert__info-list">
            @foreach ($info as $message)
                <li class="alert-item alert__info-item">{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert__success">
        <div class="alert-list alert__success-list">
            <h2 class="alert-item alert__success-item text-align_center">{{ session('status') }}</h2>
        </div>
    </div>
@endif


