$(document).ready(function(){
    $(document).on("click",".btnObrisi",function(e){
        e.preventDefault();
        var id=$(this).data("id");

        $.ajax({
            url:"/admin/comments/delete/"+id,
            method:"delete",
            dataType:"json",
            data:{
                _token:$('meta[name="csrf-token"]').attr('content')
            },
            success:function (data) {
                ispisiKomentare(data)
            },
            error:function(xhr,status,error){
                console.log(xhr.status);
            }
        })
    })
    function ispisiKomentare(data){
        let ispis="";
        for(let d of data){
            ispis+=` <tr><td>${d.ime_korisnika}</td>
                    <td>${d.prezime_korisnika}</td>
                    <td>${d.komentar}</td>
                    <td>${d.vreme}</td>
                    <td>${d.idArtikla}</td>

                    <td> <a style="color:#5a6169" data-id="${d.idKomentara}" class="btnObrisi" href=""><i class="fas fa-trash"></i></a></td></tr>`
        }
        $('#komentariTabela').html(ispis);
    }
})
