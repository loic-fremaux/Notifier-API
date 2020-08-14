@if (Session::has('failure'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <p>{{ Session::get('failure') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif

@if (Session::has('success'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
