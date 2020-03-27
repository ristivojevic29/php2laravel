$(document).ready(function(){
    $(document).on("click",".btnObrisi",function(e){
        e.preventDefault();
        var id=$(this).data("id");
        $.ajax({
            url:"/admin/users/deleteuser/"+id,
            method:"delete",
            dataType:"json",
            data:{
                _token:$('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                ispisiKorisnike(data);
            },
            error:function (xhr,status,error) {
                console.log(xhr.status);
            }
        })
    })
    function ispisiKorisnike(data){
        var ispis="";
        for(let d of data){
            var url=BASE_URL+"/admin/users/"
            ispis+=`<tr><td>${d.idKorisnik}</td>
                        <td>${d.ime_korisnika}</td>
                        <td>${d.prezime_korisnika}</td>
                         <td>${d.email}</td>
                           <td>${d.lozinka}</td>
                        <td>${d.naziv_uloge}</td>
                            <td>
                        <a style="color:#5a6169" data-id="${d.idKorisnik}" class="btnObrisi" href=""><i class="fas fa-trash"></i></a>
                        <a style="color:#5a6169" href="${url}${d.idKorisnik}"><i class="fas fa-edit"></i></a>
                </td></tr>`
        }

        $('#korisniciTabela').html(ispis);
    }

})
