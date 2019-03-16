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
            <div class="row m-t-25" >
                @foreach($offers as $o)
                    @component('components.offerview',['o'=>$o,'condition'=>$condition])
                        @endcomponent
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
@section('script')
<script>
    function select(){
        let lista=document.getElementById("prof");
        let selektovani=lista.selectedIndex;
        let vrednost=lista.options[selektovani].value;
        console.log(vrednost)
    }
</script>
@endsection