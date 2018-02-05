<div id="carousel-example-generic" class="carousel slide center-block" data-ride="carousel" style="width: 619px;height: 340px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="{{URL::asset('img/timg.jpg')}}" alt="...">
            <div class="carousel-caption">
                ...
            </div>
        </div>
        <div class="item">
            <img src="{{URL::asset('img/timg%20(2).jpg')}}" alt="...">
            <div class="carousel-caption">
                ...
            </div>
        </div>

        <div class="item">
            <img src="{{URL::asset('img/timg%20(1).jpg')}}" alt="...">
            <div class="carousel-caption">
                ...
            </div>
        </div>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
