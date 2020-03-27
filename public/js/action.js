$(document).ready(function () {
    $('#start').change(function(){
     var datum=$(this).val();
     $.ajax({
         url:"/admin/actions/date",
         method:"GET",
         dataType:"json",
         data:{
             datum:datum
         },
         success:function (data) {
            ispisiAkcije(data);
            console.log(data);
         },
         error:function(xhr,status,error){
             console.log(xhr.status)
         }
     })
    });
    function ispisiAkcije(data){
         var ispis="";
         for(let d of data){
             ispis+=`<tr>
                    <td>${d.idAkcije}</td>
                    <td>${d.akcija}</td>
                    <td>${d.datum_akcije}</td>

            </tr>`
         }
         $('#akcijeTabela').html(ispis);
    }
});
