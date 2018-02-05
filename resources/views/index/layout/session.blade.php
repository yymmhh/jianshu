@if(Session::has('session'))
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert">×</a>
        <strong></strong>{{session('session')}}
    </div>
@endif