<div class="main_blog_details">
    <img class="img-fluid" src="{{asset($s->putanja_slike)}}" alt="{{$s->naslov}}"/>
    <a href=""><h4>{{$s->naslov}}</h4></a>
    <div class="user_details">
        <div class="float-left">
            <a href="">{{$s->naziv_kategorije}}</a>

        </div>

        <div class="float-right mt-sm-0 mt-3">
            <div class="media">
                <div class="media-body">
                    <h5>{{$s->ime_korisnika}} {{$s->prezime_korisnika}}</h5>
                    <p>{{date('F j, Y H:i A', strtotime($s->datum))}}</p>

                </div>
                <div class="d-flex">
                    <img width="42" height="42" src="img/blog/user-img.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <p>{!! $s->tekst !!}</p>
    <div class="news_d_footer flex-column flex-sm-row">
        <span class="align-middle mr-2"> <i class="ti-eye">{{$s->posete}}</i></span>
        <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
            <a href="{{url("www.facebook.com")}}"><i class="fab fa-facebook-f"></i></a>
            <a href="{{url("www.twitter.com")}}"><i class="fab fa-twitter"></i></a>

        </div>
    </div>
</div>




