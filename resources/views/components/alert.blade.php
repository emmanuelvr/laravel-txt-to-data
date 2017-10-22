<div class="container">
    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" data-dismiss="alert" class="close">&times;</button>
            {{ Session::get('error') }}
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" data-dismiss="alert" class="close">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif
</div>
