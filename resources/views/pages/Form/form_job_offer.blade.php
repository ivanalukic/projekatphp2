@extends('layouts.back')


@section('content')
    <div class="main-content">
<form action="{{route('formFields.store')}}" method="post" id="forma">
@csrf
    <input type="hidden" name="formId" value="1">
    <br/>
    <input type="submit" name="submit" id="" value="Create form fields" class="form-control btn-primary">
</form>
    </div>
@endsection
@section('script')
    <script>
        let options=[];
        //funkcija za ispisivanje opcija u ddl
        function ispisivanje(brojac){
            let div=$(document).find('#ddl_'+brojac);
            let ispis=`<option value="0" >Select field type</option>`;
            for(let option of options){
                ispis+=`<option value="${option.id}">${option.name}</option>`
            }
            div.html(ispis);
        }
        //funkcija za dodavanje polja
        function addField(brojac){
           return ` <div class="row" data-id="${brojac}">
        <div class="col-md-4">
            <input type="text" name="label_${brojac}" placeholder="Label" class="form-control">
        </div>
        <div class="col-md-4">
            <select name="ddl_${brojac}" class="form-control ddl" id="ddl_${brojac}">
            </select>
        </div>
        <div class="col-md-4 options">

        </div>
        <div class="col-md-12">
            <button type="button" class="form-control add_form_field">ADD</button>
        </div>
    </div>`
        }
        $(document).ready(function () {
            $('#forma').prepend(addField(brojac));
            brojac++;

            // ucitavanje strane
            $.ajax({
                url:baseUrl+'api/type',
                method:'get',
                dataType:'json',
               success:function (data) {
                    options=data;
                   ispisivanje(0);
               },
               error:function () {

               }
                }
            )
        })
        let brojac=0;
        //dodavanje novog polja na klik dugmeta
        $(document).on('click','.add_form_field',function(){
            $(this).parent().parent().after(addField(brojac));
            ispisivanje(brojac);
            brojac++;
        });
        function addOptionText(brojac){

           return `<div class="row">
                   <div class="col-md-12">
                    <input type="text" name="options_${brojac}[]" placeholder="Value for option" class="form-control">
                    </div>
                    <div class="col-md-12">
                    <button type="button" data-brojac="${brojac}" class="form-control add_field_option">ADD</button>
                    </div>
                    </div>`
        }
        //dodavanje tektualnih polja kada se selektuje polje koje mora da ima opcije
            $(document).on('change','.ddl',function () {
            let list=$(this).val();
            let id=$(this).parent().parent().data('id')
            if(list==2 || list==6 || list==3){
                $(this).parent().parent().find('.options').html(addOptionText(id));
            }
        })
        //dodavanje novog polja za opcije
        $(document).on('click','.add_field_option',function(){
            let id=$(this).parent().parent().parent().parent().data('id')
            $(this).parent().parent().after(addOptionText(id));
        });

    </script>


@endsection