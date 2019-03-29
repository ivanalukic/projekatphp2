@extends('layouts.back')
@section('menu')
    @php
        $user=['id'=>25,'ime'=>'LogIn','prezime'=>'Lukic','company_id'=>1];
    @endphp
    {{Session::put('user',$user)}}
    <li class=" has-sub">
        <a href="{{route('myOffers',['id'=>\Illuminate\Support\Facades\Session::get('user')['id']])}}">
            <i class="fas fa-clipboard-list"></i>My job offers
        </a>
    </li>
    <li class="">
        <a href="{{route('createForm')}}">
            <i class="far fa-plus-square"></i>Create job offer
        </a>
    </li>
@endsection
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row m-t-25">
                @foreach($offers as $offer)
                    <div class="col-md-6 col-lg-6">
                        <div class="card-header">
                            <strong class="card-title mb-3">{{$offer->name}}</strong>
                        </div>
                        <div class="statistic__item">
                            <div class="text text-black">
                    <span>
                        {{$offer->description}}
                    </span>
                                <br/>
                                <strong class="card-title mb-3">Conditions:</strong>
                                <span>
                        <br/>
                        @foreach($condition as $c)
                                        @if($c->job_offer_id==$offer->jobOfferId)
                                            {{$c->name}}
                                            <br/>
                                        @endif
                                    @endforeach
                    </span>
                            </div>
                            <div class="icon">
                                <i class="zmdi zmdi-calendar-note"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

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
