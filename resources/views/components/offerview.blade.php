<a href="#" style="color: #666666;" class="col-md-6 col-lg-4">
    <div class="card-header">
        <strong class="card-title mb-3">{{$o['name']}}</strong>
    </div>
    <div class="statistic__item">
        <div class="text text-black">
                    <span>
                {{$o['description']}}
                    </span>
            <br/>
            <strong class="card-title mb-3">Conditions:</strong>
            <span>
                        <br/>
                        @foreach($condition as $c)
                    @if($c->job_offer_id==$o->id)
                        {{$c->name}}
                    @endif
                @endforeach
                    </span>
        </div>
        <div class="icon">
            <i class="zmdi zmdi-calendar-note"></i>
        </div>
    </div>

</a>