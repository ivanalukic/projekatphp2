@extends('layouts.front')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row m-t-25" >
                @foreach($offers as $o)
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
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END MAIN CONTENT-->

@endsection