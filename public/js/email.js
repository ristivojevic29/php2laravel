$(document).ready(function(){
    $(document).on("click",".btnObrisi",function(e){
        e.preventDefault();
        var id=$(this).data("id");
        $.ajax({
            url:"/admin/emails/delete/"+id,
            method:"delete",
            dataType:"json",
            data:{
                _token:$('meta[name="csrf-token"]').attr('content')
            },
            success:function (data) {
                    ispisiMejlove(data)
            },
            error:function(xhr,status,error){
                console.log(xhr.status);
            }
        })
    })
    function ispisiMejlove(data){
        let ispis="";
        for(let d of data){
            ispis+=` <td>${d.id}</td>
                    <td>${d.ime}</td>
                    <td>${d.email}</td>
                    <td>${d.naslov}</td>
                    <td>${d.poruka}</td>
                    <td>${d.datum}</td>
                    <td> <a style="color:#5a6169" data-id=">${d.id}" class="btnObrisi" href=""><i class="fas fa-trash"></i></a></td>`
        }
        $('#emailTabela').html(ispis);
    }
})
