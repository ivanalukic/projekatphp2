let baseUrl="http://localhost/ProjekatZaSkolu/public/";
function change(){
    let lista=document.getElementById("selected");
    let selektovani=lista.selectedIndex;
    let vrednost=lista.options[selektovani].value;

    $.ajax({
        url: baseUrl+"createForm/profession/"+vrednost,
        method: 'get',
        dataType: "json",
        success: function(data){
            let ispis='';
            $.each(data,function (i,podatak) {
                ispis+=`<div class="checkbox">
                                    <label for="checkbox" class="form-check-label ">
                                        <input type="checkbox" name="checked[]" id="checkbox${podatak.id}" name="checkbox${podatak.id}}" value="${podatak.id}" class="form-check-input">${podatak.name}
                                    </label>
                                </div>`;
            })
            $('#view').html(ispis);
        },
        error:function (xhr,status,msg) {
        }
    });
}
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

        },
        error:function (xhr,status,msg) {
        }
    });
}





