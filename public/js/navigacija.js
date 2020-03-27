$(document).ready(function(){
    $('#formaZaUpdate').hide();
    $(document).on("click",".dodajMeni",function(e){
        e.preventDefault();
        var nazivMenija=$('#tbNazivMenija').val();
        var nazivRute=$('#tbNazivRute').val();

        $.ajax({
            url:"/admin/navigation/createnav",
            method:"POST",
            dataType:"json",
            data:{
                nazivMenija:nazivMenija,
                nazivRute:nazivRute,
                _token:$('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                ispisiMeni(data)
                $('#tbNazivMenija').val("");
                $('#tbNazivRute').val("");
            },
            error:function (xhr,status,error) {
                console.log(xhr.status)
            }
            }

        )
    })
    function ispisiMeni(data){
        var ispis="";
        for(let d of data){
            ispis+=`<tr>
                    <td>${d.idMeni}</td>
                    <td>${d.imeMenija}</td>
                    <td>${d.rutaMenija}</td>
                     <td>
                    <a style="color:#5a6169" data-id="${d.idMeni}" class="btnObrisi" href=""><i class="fas fa-trash"></i></a>
                    <a style="color:#5a6169" data-id="${d.idMeni}" class="btnUpdate" href=""><i class="fas fa-edit"></i></a>
                     </td>
                    </tr>`
        }
        $('#navigacijaTabela').html(ispis)
    }
    $(document).on("click",".btnObrisi",function(e){
        e.preventDefault();
        var id=$(this).data("id");

        $.ajax({
            url:"/admin/navigation/delete/"+id,
            method:"delete",
            dataType:"json",
            data:{
                _token:$('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                ispisiMeni(data)
            },
            error:function(xhr,status,error){
                console.log(xhr.status)
            }
        })
    })
    $(document).on("click","tr>td>.btnUpdate",function(e){
        e.preventDefault();
        var id=$(this).data("id");
        $('#formaZaUpdate').show();
        $.ajax({
            url:"/admin/navigation/"+id,
            method:"GET",
            data:{
                _token:$('meta[name="csrf-token"]').attr('content')
            },
            dataType:"json",
            success:function (data) {
                $('#tbMenuTitle').val(data.imeMenija);
                $('#tbRouteTitle').val(data.rutaMenija);
            },error:function (xhr,status,error) {
                console.log(xhr.status)
            }
        })
        $(document).on("click",'#ubaciMeni',function(e) {
            e.preventDefault();
            update(id);
        })
    })
    function update(id){
        var nazivMenija=$('#tbMenuTitle').val();
        var nazivRute=$('#tbRouteTitle').val();
        $.ajax({
            url:"/admin/navigation/update/"+id,
            method:"POST",
            dataType:"json",
            data:{
                _token:$('meta[name="csrf-token"]').attr('content'),
                nazivMenija:nazivMenija,
                nazivRute:nazivRute
            },
            success:function(data){
                ispisiMeni(data)
                $('#formaZaUpdate').hide();
            },
            error:function(xhr,status,error){
                console.log(xhr.status);
            }
        })
    }
})
