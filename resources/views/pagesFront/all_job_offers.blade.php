@extends('layouts.front')
@section('select')
    <form class="form-header" action="" method="POST">
        <div class="row" style="width:400px;">
            <div class="col-md-12">
                <select name="prof" id="prof" class="form-control" onChange="select()">
                    <option value="0">Select profession</option>
                    @foreach($professions as $p)
                        <option value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
@endsection
@section('content')
    <!-- MAIN CONTENT-->

    <div class="main-content">
        <div class="section__content section__content--p30">
            @if(session()->has('msg'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('msg')}}
                </div>
            @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('error')}}
                    </div>
                @endif
            <div class="row m-t-25" id="show">
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

        function Offers() {
            let conditions=[];
            let offers=[];
            function all() {
                $.ajax({
                    url: baseUrl+"api/jobOffer",
                    method: 'get',
                    dataType: "json",
                    success: function(data){
                        conditions=data.condition;
                        offers=data.offers;
                        generateOffer();

                    },
                    error:function (xhr,status,msg) {
                    }
                });
            }
            function filtrated(id) {
                $.ajax({
                    url: baseUrl+"api/jobOffer",
                    method: 'get',
                    dataType: "json",
                    success: function(data){
                        conditions=data.condition;
                        offers=data.offers;
                        generateOffer();
                    },
                    error:function (xhr,status,msg) {
                    }
                });
            }
            function generateOffer(id=0) {
                let ispis='';
                for(o of offers) {
                    if(id==0){
                        ispis += `<a href="${asset}form_view/${o.id}" style="color: #666666;"class="col-md-12 col-lg-6">
                    <div class="card-header">
                    <strong class="card-title mb-3">${o.name}</strong>
                    </div>
                    <div class="statistic__item">
                    <div class="text text-black">
                    <span>
                        ${o.description}
                    </span>
                    <br/>
                    <strong class="card-title mb-3">Conditions:</strong>
                <span>
                <br/>`
                        for(c of conditions){
                            if(c.job_offer_id==o.id){
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
                    </a>`
                    }else if(id>0){
                        if(o.profession_id==id){
                            ispis += `<a href="${asset}form_view/${o.id}" style="color: #666666;"class="col-md-12 col-lg-6">
                    <div class="card-header">
                    <strong class="card-title mb-3">${o.name}</strong>
                    </div>
                    <div class="statistic__item">
                    <div class="text text-black">
                    <span>
                        ${o.description}
                    </span>
                    <br/>
                    <strong class="card-title mb-3">Conditions:</strong>
                <span>
                <br/>`
                            for(c of conditions){
                                if(c.job_offer_id==o.id){
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
                    </a>`
                        }
                    }

                }
                let div=document.getElementById('show');
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

        function select(){
            let lista=document.getElementById("prof");
            let selektovani=lista.selectedIndex;
            let vrednost=lista.options[selektovani].value;
            module.generateOffer(vrednost);
        }
</script>
@endsection