@extends('layouts.back')
@section('menu')
    <li class=" has-sub">
        <a href="{{route('myOffers',['id'=>'1'])}}">
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
            <div class="text text-black">
                <strong class="card-title mb-3"> Active job offers</strong>
            </div>
            <div class="row m-t-25" style="border-bottom:solid gray; " id="on">
                {{--dinamicko ispisivanje oglasa za odgovarajuceg korisnika--}}
                {{--@foreach($offers as $offer)--}}
                    {{--<div class="col-md-12 col-lg-6">--}}
                        {{--<div class="card-header">--}}
                            {{--<strong class="card-title mb-3">{{$offer->name}}</strong>--}}
                            {{--<div style="display:inline-block;float: right;width: 40px;"id="{{$offer->id}}" class="offers">--}}
                                {{--<label class="switch switch-text switch-secondary switch-pill">--}}
                                    {{--<input type="checkbox" class="switch-input" checked="true">--}}
                                    {{--<span data-on="On" data-off="Off" class="switch-label"></span>--}}
                                    {{--<span class="switch-handle"></span>--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            {{--<div style="display:inline-block;float: right;width: 40px;"id="{{$offer->id}}" class="destroy">--}}
                            {{--<i class="fas fa-times fa-2x"></i>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="statistic__item">--}}
                            {{--<div class="text text-black">--}}
                    {{--<span>--}}
                        {{--{{$offer->description}}--}}
                    {{--</span>--}}
                                {{--<br/>--}}
                                {{--<strong class="card-title mb-3">Conditions:</strong>--}}
                    {{--<span>--}}
                        {{--<br/>--}}
                        {{--@foreach($condition as $c)--}}
                                        {{--@if($c->job_offer_id==$offer->id)--}}
                                            {{--{{$c->name}}--}}
                                {{--<br/>--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div class="icon">--}}
                                {{--<i class="zmdi zmdi-calendar-note"></i>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            </div>
            <div class="text text-black">
                <strong class="card-title mb-3">Inactive job offers</strong>
            </div>
            <div class="row m-t-25" id="off">
                {{--dinamicko ispisivanje oglasa za odgovarajuceg korisnika--}}
                {{--@foreach($offOffers as $offer)--}}

                    {{--<div class="col-md-6 col-lg-6">--}}
                        {{--<div class="card-header">--}}
                            {{--<strong class="card-title mb-3">{{$offer->name}}</strong>--}}
                            {{--<div style="display:inline-block;float: right;width: 40px;"id="{{$offer->id}}" class="offers">--}}
                                {{--<label class="switch switch-text switch-secondary switch-pill">--}}
                                    {{--<input type="checkbox" class="switch-input" checked="true">--}}
                                    {{--<span data-on="On" data-off="Off" class="switch-label"></span>--}}
                                    {{--<span class="switch-handle"></span>--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            {{--<div style="display:inline-block;float: right;width: 40px;"id="{{$offer->id}}" class="destroy">--}}
                               {{--<button><i class="fas fa-times fa-2x"></i></button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="statistic__item">--}}
                            {{--<div class="text text-black">--}}
                    {{--<span>--}}
                        {{--{{$offer->description}}--}}

                    {{--</span>--}}
                            {{--<br/>--}}
                                {{--<strong class="card-title mb-3">Conditions:</strong>--}}
                    {{--<span>--}}
                        {{--<br/>--}}
                        {{--@foreach($condition as $c)--}}
                            {{--@if($c->job_offer_id==$offer->id)--}}
                        {{--{{$c->name}}--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div class="icon">--}}
                                {{--<i class="zmdi zmdi-calendar-note"></i>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
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
@section('script')
    <script>
        //edit oglasa
        $('body').on('change','.offers',off
        );
        function off() {
            var id = $(this).attr('id');
            $.ajax({
                url: baseUrl+"api/jobOffer/"+id,
                method: 'put',
                data:{
                    _token:csrf
                },
                dataType: "json",
                success: function(data){
                    module.all();
                    console.log('tu')
                },
                error:function (xhr,status,msg) {
                }
            });
        }
        //brisanje oglasa
        $('body').on('click','.destroy',del
        );
        function del() {
            var id = $(this).attr('id');
            $.ajax({
                url: baseUrl+"api/jobOffer/"+id,
                method: 'delete',
                data:{
                    _token:csrf
                },
                dataType: "json",
                success: function(data){
                    module.all()
                },
                error:function (xhr,status,msg) {
                }
            });
        }
        function Offers() {
            let conditions=[];
            let offers=[];
            let offOffers=[];
            function all() {
                $.ajax({
                    url: baseUrl+"api/jobOffer/1",
                    method: 'get',
                    dataType: "json",
                    success: function(data){
                        conditions=data.condition;
                        offers=data.offers;
                        offOffers=data.offOffers;
                        generateOffer(offers,'on');
                        generateOffer(offOffers,'off');
                    },
                    error:function (xhr,status,msg) {
                    }
                });
            }
            function generateOffer(offers,page) {
                let ispis='';
                for(offer of offers) {
                    ispis += `
                    <div class="col-md-12 col-lg-6">
                        <div class="card-header">
                            <strong class="card-title mb-3">${offer.name}</strong>
                            <div style="display:inline-block;float: right;width: 40px;"id="${offer.id}" class="offers">
                                <label class="switch switch-text switch-secondary switch-pill">
                                    <input type="checkbox" class="switch-input" checked="true">
                                    <span data-on="On" data-off="Off" class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div>
                            <div style="display:inline-block;float: right;width: 40px;cursor: pointer;"id="${offer.id}" class="destroy">
                            <i class="fas fa-times fa-2x"></i>
                            </div>
                        </div>
                        <div class="statistic__item">
                            <div class="text text-black">
                    <span>
                        ${offer.description}
                    </span>
                                <br/>
                                <strong class="card-title mb-3">Conditions:</strong>
                    <span>
                        <br/>`
                    for(c of conditions){
                        if(c.job_offer_id==offer.id){
                            ispis+=`${c.name}`
                        }
                    }
                    ispis+=`
                    </span>
                            </div>
                            <div class="icon">
                                <i class="zmdi zmdi-calendar-note"></i>
                            </div>
                        </div>
                    </div>
                `


                }
                let div=document.getElementById(page);
                div.innerHTML=ispis;

            }
            return{ all,
                generateOffer
            }
        }
        let module = Offers();
        $(document).ready(function () {
            module.all();
        })





    </script>
@endsection