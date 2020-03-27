$(document).ready(function () {
    $('#ubaciKategoriju').click(function(e){
        e.preventDefault();
        var nazivKategorije=$('#imeKategorije').val();

        $.ajax({
            url:"/admin/insertCategory",
            method:"post",
            dataType:"json",
            data:{
                nazivKategorije:nazivKategorije,
                _token:$("input[name='_token']").val()
            },
            success:function(data){
                ispisiKategorije(data);
                $('#imeKategorije').val("");
            },
            error:function(xhr,status,error){

            }
        })
    })
    function ispisiKategorije(data){
        var ispis=' <option value="0">Choose...</option>';
        for(let d of data){
            ispis+=`<option value="${d.idKategorije}">${d.naziv_kategorije}</option>`
        }
        $('#ddKat').html(ispis);

    }

    $(document).on("click",".btnObrisi",function(e){
        e.preventDefault();
        var id=$(this).data("id");
        $.ajax({
            url:"/admin/post/delete/"+id,
            method:"delete",
            dataType:"json",
            data:{
                _token:$('meta[name="csrf-token"]').attr('content')
            },
            success:function(data) {
                ispisiPostove(data);
                console.log(data);
            },
            error:function(xhr,status,error){

            }
        })
    })
    function ispisiPostove(data){
        var ispis="";
        for(let d of data){
            var slike=BASE_URL+"/"+d.putanja_slike;
            var url=BASE_URL+"/admin/posts/";
            ispis+=`<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card card-small card-post card-post--1">
                <div class="card-post__image" style="background-image:url('${slike}');">
            <a href="#" class="card-post__category badge badge-pill badge-dark">${d.naziv_kategorije}</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <a class="text-fiord-blue" href="#">${d.naslov}</a>
            </h5>
            <span class="text-muted"></span>
            <form method="post">
              <span><a href="" data-id="${d.idArtikla}" class="btnObrisi">Delete</a></span>
               <span><a href="${url}${d.idArtikla}" class="btnUpdate">Update</a></span>
            </form>
        </div>
    </div>
</div>`
        }
        $('#sviArtikli').html(ispis);
    }
})
