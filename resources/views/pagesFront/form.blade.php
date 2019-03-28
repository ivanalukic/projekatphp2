@extends('layouts.front')
@section('content')
    <div class="main-content container">
        <div class="section__content section__content--p30">
            <div class="container-fluid d-flex justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12 ">
                    <div class="card">
                        <div class="card-header">
                            <strong style="font-size: 20px;">{{$formName}}</strong>
                        </div>
                        <div class="card-body card-block">
<form method="post" action="{{route('candidateStore')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="hidden" value="{{$id}}">
    <br/>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">First name</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" id="text-input" name="first_name" placeholder="Enter first name" class="form-control">
            <small class="form-text text-muted">This is field for first name</small>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Last name</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" id="text-input" name="last_name" placeholder="Enter last name" class="form-control">
            <small class="form-text text-muted">This is field for last name</small>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="email-input" class=" form-control-label">Email</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="email" id="email-input" name="email" placeholder="Enter email" class="form-control">
            <small class="form-email text-muted">This is field for email</small>
        </div>
    </div>
@foreach($fields as $f)
    @if($f->type_id==1)
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">{{$f->name}}</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="field_{{$f->formFieldId}}" placeholder="Enter {{$f->name}}" class="form-control">
                    <small class="form-text text-muted">This is field for {{$f->name}}</small>
                </div>
            </div>
    @endif
    @if($f->type_id==2)
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">{{$f->name}}</label>
                            </div>
                            <div class="col col-md-9">
                                <div class="form-check" id="view">
                                 @foreach($options as $o)
                                     @if($o->option_field_id==$f->id)
                                        <div class="checkbox">
                                            <label for="checkbox" class="form-check-label ">
                                        <input type="checkbox" name="field_{{$f->formFieldId}}[]" id="checkbox" value="{{$o->optionName}}" class="form-check-input">{{$o->optionName}}
                                            </label>
                                        </div>
                                     @endif
                                 @endforeach

                            </div>
                        </div>
                        </div>
    @endif
    @if($f->type_id==3)
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">{{$f->name}}</label>
                </div>
                <div class="col col-md-9">
                    <div class="form-check" id="view">
                        @foreach($options as $o)
                            @if($o->option_field_id==$f->id)
                                <div class="custom-radio">
                                    <label for="radio" class="form-check-label ">
                                        <input type="radio" name="field_{{$f->formFieldId}}" id="radio" value="{{$o->optionName}}" class="form-check-input">{{$o->optionName}}
                                    </label>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
    @endif
    @if($f->type_id==4)
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">{{$f->name}}</label>
                </div>
                <div class="col col-md-9">
                    <label for="reset" class="form-check-label ">
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> {{$f->name}}
                        </button>
                    </label>
                </div>
            </div>
    @endif
    @if($f->type_id==5)
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">{{$f->name}}</label>
                </div>
                <div class="col col-md-9">
                    <label for="submit" class="form-check-label ">
                        <button type="submit" class="form-control btn-secondary ">{{$f->name}}</button>
                    </label>
                </div>
            </div>
    @endif
    @if($f->type_id==6)
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">{{$f->name}}</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="field_{{$f->formFieldId}}" id="" class="form-control">
                        <option value="0">Please select</option>
                        @foreach($options as $o)
                            @if($o->option_field_id==$f->id)
                            <option value='{{$o->optionName}}'>{{$o->optionName}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
    @endif
@endforeach
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Your CV</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="file" id="text-input" name="cv" placeholder="Put your cv" class="form-control">
            <small class="form-text text-muted">This is field for cv</small>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class=" form-control-label">Conditions</label>
        </div>
        <div class="col col-md-9">
            <div class="form-check" id="view">
            @foreach($conditions as $c)
                    <div class="checkbox">
                        <label for="checkbox" class="form-check-label ">
                            <input type="checkbox" name="conditions[]" id="checkbox" value="{{$c->id}}" class="form-check-input">{{$c->name}}
                        </label>
                    </div>
            @endforeach
            </div>
        </div>
    </div>
    <button class="form-control btn-secondary ">Apply on job offer</button>
</form>
                        </div>
                    </div></div>
            </div>
        </div>
    </div>
@endsection