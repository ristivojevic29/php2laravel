$(document).ready(function(){
    localStorage.clear();
    function goToByScroll(id) {

        id = id.replace("link", "");

        $('html,body').animate({
            scrollTop: $("." + id).offset().top
        }, 'slow');
    }
    var katId=0;
    var uneto=null;
    displayPag(katId,uneto);
    function displayPag(katId,uneto) {
        $.ajax({
            url: "/brojArtikala",
            method: "GET",
            dataType: "json",
            data:{
              katId:katId,
              uneto:uneto
            },
            success: function (data) {
                console.log(data)
                prikaziPaginaciju(data);
                if(katId>0){
                    localStorage.setItem("kategorija",katId);
                }else if(uneto!=null){
                    localStorage.setItem("uneto",uneto);
                }

            }
        })
    }
    function prikaziPaginaciju(broj){
        let ispis="<ul class=\"pagination\">";
        let paginacija=broj;
        let po_strani=4;
        let ukupno=Math.ceil(paginacija/po_strani)
        for(let i=1;i<=ukupno;i++){
            ispis+=` <li class="page-item">
                        <a href="" class="page-link page" data-id="${i}">
                                  <span aria-hidden="false">
                                   ${i}
                                  </span>
                        </a>
                    </li>`
        }
        ispis+="</ul>"
        $('.blog-pagination.justify-content-center.d-flex').html(ispis)
    }
    $(document).on('click','.page-link.page',function(e){
        e.preventDefault()
        var kat=localStorage.getItem("kategorija");
        var uneto=localStorage.getItem("uneto");
        console.log(uneto);
        console.log(kat);
        goToByScroll('single-recent-blog-post');
        var strana = $(this).data('id');
        if(kat==null && (uneto==null || uneto=="")){
            $.ajax({
                url: "/",
                method: "GET",
                dataType: "json",
                data: {
                    strana: strana
                },
                success: function (data) {
                    console.log(data)
                    ispisiArtikle(data);
                    displayPag()
                }
            })
        }
        else if(uneto!=null){
            $.ajax({
                url:"/posts/search/",
                method:"GET",
                dataType:"json",
                data:{
                    uneto:uneto,
                    strana:strana
                },
                success:function(data){
                    console.log(data);
                    ispisiArtikle(data)
                    displayPag(katid=0,uneto);
                },
                error:function(xhr,status,error){
                    console.log(xhr.status)
                }
            })
        }
        else{
            $.ajax({
                url:"/category/"+kat,
                method:"GET",
                dataType:"json",
                data:{
                    strana:strana
                },
                success: function (data) {
                    console.log(data)
                    ispisiArtikle(data);
                    displayPag(kat,uneto="")
                }
            })
        }

    });

        $('.d-flex.justify-content-between').click(function (e) {
            e.preventDefault()
            var id = $(this).data("id");

            displayPag(id,uneto="")
            $.ajax({
                url: "/category/" + id,
                method: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    displayPag(id,uneto="")
                    ispisiArtikle(data)
                    localStorage.removeItem("uneto");

                },
                error: function (xhr, status, error) {
                    console.log(xhr.status)
                }
            })
        })


    function ispisiArtikle(data){
            var ispis="";
            for(let d of data){
                ispis+=`<div class="single-recent-blog-post">
            <div class="thumb">
               <img class="img-fluid" src="${d.putanja_slike}" alt="">
                <ul class="thumb-info">
                    <li><a href="${'/post/'+d.idArtikla}"><i class="ti-user"></i>${d.ime_korisnika} ${d.prezime_korisnika}</a></li>
                    <li><a href="${'/post/'+d.idArtikla}"><i class="ti-notepad"></i>${prikazivreme(d.datum)}</a></li>
<!--                   <li><a href="{{url('/post/'.$a->idArtikla)}}"><i class="ti-themify-favicon"></i></a></li>-->
                </ul>
            </div>
            <div class="details mt-20">
                <a href="${'/post/'+d.idArtikla}">
                   <h3>${d.naslov}.</h3>
                </a>
                <p class="tag-list-inline">Tag: <a href="#">${d.naziv_kategorije}</a></p>
<!--               <p>{{$a->tekst}}</p>-->
                <a class="button" href="${'/post/'+d.idArtikla}">Read More <i class="ti-arrow-right"></i></a>
            </div>
        </div>
`
            }
            ispis+=`<div class="row">
        <div class="col-lg-12">
            <nav class="blog-pagination justify-content-center d-flex">

                </nav>
         </div>

        </div>`
            $('.col-lg-8').html(ispis);

    }
    function prikazivreme(vreme){
       var noviDatum=new Date(vreme);
       var meseci=["January","February","March","April","May","June","July","August","September","October","November","December"]
       return meseci[noviDatum.getMonth()]+" "+noviDatum.getDate()+", "+noviDatum.getFullYear();
    }



    $('#searchPolje').keyup(function(){
        var uneto=$(this).val();
        $.ajax({
            url:"/posts/search/",
            method:"GET",
            dataType:"json",
            data:{
                uneto:uneto
            },
            success:function(data){
                console.log(data);
                ispisiArtikle(data)
                displayPag(katId=0,uneto)
                localStorage.removeItem("kategorija");
            },
            error:function(xhr,status,error){
                console.log(xhr.status)
            }
        })
    })
})
