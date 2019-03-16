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
    <div class="main-content container">
        <div class="section__content section__content--p30">
            <div class="container-fluid d-flex justify-content-center">
    <div class="col-lg-8 col-md-12 col-sm-12 ">
        <div class="card">
            <div class="card-header">
                <strong style="font-size: 20px;">Create your job offer</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('createJobOffer')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="Enter name" class="form-control">
                            <small class="form-text text-muted">This is field for name of this job offer</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="start" class=" form-control-label">Start date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="start" name="start" placeholder="YYYY-MM-DD H:i:s" class="form-control">
                            <small class="form-text text-muted">This is field for start date</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="end" class=" form-control-label">End date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="end" name="end" placeholder="YYYY-MM-DD H:i:s" class="form-control">
                            <small class="form-text text-muted">This is field for end date </small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="textarea-input" rows="9" placeholder="Description..." class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Profession</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="selected" id="selected" class="form-control" onChange="change()">
                                <option value="0">Please select</option>
                                @foreach($professions as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div><div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Conditions</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check" id="view">
                                {{--@foreach($cond as $c)--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label for="checkbox{{$c->id}}" class="form-check-label ">--}}
                                        {{--<input type="checkbox" name="checked[]" id="checkbox{{$c->id}}" name="checkbox{{$c->id}}" value="{{$c->id}}" class="form-check-input">{{$c->name}}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--@endforeach--}}
                            </div>
                        </div>
                    </div>

    <div class="card-footer">
     <input type="submit" class="btn btn-primary btn-sm" value="Create">
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
    </div>
                </form>
            </div>
        </div></div>
            </div>
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
@endsection