@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">{{$message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-dismissible fade show">{{$message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible fade show">{{$message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible fade show">{{$message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
    @foreach ($errors->all() as $error)
    <ul>
        <li>{{ $error }}</li>
    </ul>
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session::has('validationErrors'))
    <div class = "alert alert-danger alert-dismissible fade show">
        @foreach (session::get('validationErrors') as $item)
            @foreach ($item as $eer)
                <ul>
                    <li>{{$eer}}</li>
                </ul>
            @endforeach
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif