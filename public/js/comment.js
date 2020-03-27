$(document).ready(function(){
    localStorage.clear()
    $('.form-group.replyDugme').hide();
    $(document).on("click",".btn-reply.text-uppercase",function(e){
        e.preventDefault();
        $('.form-group.replyDugme').show();
        $('.form-group.commentDugme').css({"float":"left"});

        goToByScroll("comment-form");
        var idParent=$(this).data("id");
        console.log(idParent)

        localStorage.setItem("parent",idParent);

    })
    $('.button.submit_btn.replyBtn').click(function(e){
        var idParent=localStorage.getItem("parent");
        e.preventDefault();
        posaljiKomentar(idParent);
    })
    function goToByScroll(id) {

        id = id.replace("link", "");

        $('html,body').animate({
            scrollTop: $("." + id).offset().top
        }, 'slow');
    }

    $('.button.submit_btn.dugme').click(function(e){
        e.preventDefault();
        posaljiKomentar();
    })
    function posaljiKomentar(idParent){
        if(idParent==null || idParent==0)
            idParent=0;
        var idArtikla=$('#hiddenIdArticle').val();
        var tekst = CKEDITOR.instances['message'].getData();
        $.ajax({
            url: BASE_URL + "/comments",
            method: "post",
            dataType: "json",
            data: {
                tekst: tekst,
                _token: $("input[name='_token']").val(),
                idArtikla: idArtikla,
                idParent:idParent
            },
            success: function (data) {
                console.log(data);
                ispisiKomentare(data);
                CKEDITOR.instances['message'].updateElement();
                CKEDITOR.instances['message'].setData('');
                localStorage.removeItem("parent");
            },
            error: function (xhr, status, error) {
                console.log(xhr.status);
            }
        })
    }
    function ispisiKomentare(data){
        var ispis=`<h4 id='brojKomentara'>`+data.length+ ` Comments</h4>`;
        var duzina=data.length;
        $('#promenaKomentara').html(duzina+" Comments");
    for(let k of data){
            if(k.idKomentarParent==0){
          ispis+= `<div class= "comment-list" >
                <div class= "single-comment justify-content-between d-flex" >
                <div class= "user justify-content-between d-flex" >
                <div class="thumb" >
                <img src = "img/blog/c1.jpg" alt = ""/>
                </div>
                <div class="desc">
                <h5> <a href="#">${k.ime_korisnika} ${k.prezime_korisnika}</a></h5>
        <p class="date">${prikaziVreme(k.vreme)}</p>
           <p class="comment">${k.tekst}</p>
           </div>
            </div>
            <div class="reply-btn">
           <a href="" data-id="${k.idKomentara}"  class="btn-reply text-uppercase"> reply </a>
                </div>
                </div>
                </div>`
        }
        for(let  c of data){
        if(c.idKomentarParent != 0 && (c.idKomentarParent == k.idKomentara)){
        ispis+=`<div class= "comment-list left-padding">
              <div class= "single-comment justify-content-between d-flex" >
                <div class = "user justify-content-between d-flex" >
                <div class= "thumb" >
                <img src = "img/blog/c2.jpg" alt = "" >
                </div>
                <div class= "desc" >
                <h5><a href = "#" >${c.ime_korisnika} ${c.prezime_korisnika}
        </a></h5>
            <p class = "date" >${prikaziVreme(c.vreme)}
            </p>
            <p class= "comment" >${c.tekst}
        </p>

            </div>
            </div>

            </div>
            </div>`

        }
     }
        }
        $('.comments-area').html(ispis);
    }
    function  prikaziVreme(vreme) {
        var noviDatum=new Date(vreme);
        var meseci=["January","February","March","April","May","June","July","August","September","October","November","December"]
        var doba="";
        if(noviDatum.getHours()>0 && noviDatum.getHours()<=12){
            doba="AM";
        }else{
            doba="PM"
        }
        return meseci[noviDatum.getMonth()]+" "+noviDatum.getDate()+", "+noviDatum.getFullYear()+" "+noviDatum.getHours()+":"+noviDatum.getMinutes()+" "+doba;
    }

})
