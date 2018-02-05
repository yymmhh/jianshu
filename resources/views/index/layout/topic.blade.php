<ul class="nav navbar-nav">
    <div class="btn-group">
        <button type="button" style="font-size:16px;background-color: #0f0f0f;border: 0px;color: white" class="btn btn-default dropdown-toggle btn-lg"
                data-toggle="dropdown">
            专题<span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            @foreach($topic as $item)
            <li><a href="/topic/{{$item->id}}">{{$item->name}}</a></li>


                @endforeach

        </ul>
    </div>
</ul>