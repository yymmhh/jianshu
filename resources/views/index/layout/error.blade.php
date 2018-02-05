@if($errors->count()>0)

    @foreach($errors->all() as $item)
<div class="alert alert-danger">
    <a class="close" data-dismiss="alert">×</a>
    <strong></strong>{{$item}}
</div>
@endforeach
    @endif