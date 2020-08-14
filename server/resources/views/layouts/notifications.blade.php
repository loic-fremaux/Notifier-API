@if (Session::has('failure'))
    <div class="alert alert-danger">
        <p>{{ Session::get('failure') }}</p>
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif