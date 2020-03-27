<div class="single-recent-blog-post">
    <div class="thumb">
        <img class="img-fluid" src="{{$a->putanja_slike}}" alt="">
        <ul class="thumb-info">
            <li><a href="{{url('/post/'.$a->idArtikla)}}"><i class="ti-user"></i>{{$a->ime_korisnika." ".$a->prezime_korisnika}}</a></li>
            <li><a href="{{url('/post/'.$a->idArtikla)}}"><i class="ti-notepad"></i>{{date('F j, Y', strtotime($a->datum))}}</a></li>

            {{--                    <li><a href="{{url('/post/'.$a->idArtikla)}}"><i class="ti-themify-favicon"></i></a></li>--}}
        </ul>
    </div>
    <div class="details mt-20">
        <a href="{{url('/post/'.$a->idArtikla)}}">
            <h3>{{$a->naslov}}.</h3>
        </a>
        <p class="tag-list-inline">Tag: <a href="#">{{$a->naziv_kategorije}}</a></p>
        {{--                <p>{{$a->tekst}}</p>--}}
        <a class="button" href="{{url('/post/'.$a->idArtikla)}}">Read More <i class="ti-arrow-right"></i></a>
    </div>

</div>
