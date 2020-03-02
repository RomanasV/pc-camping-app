@if (session('success'))
    <div class="warning warning-success">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="warning warning-error">
        {{session('error')}}
    </div>
@endif