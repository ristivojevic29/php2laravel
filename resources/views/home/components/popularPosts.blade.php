
        <div class="single-post-list">
            <div class="thumb">
                <img class="card-img rounded-0" src="{{asset($pp->putanja_slike)}}" alt="{{$pp->naslov}}">
                <ul class="thumb-info">
                    <li><a href="#">{{$pp->ime_korisnika}} {{$pp->prezime_korisnika}}</a></li>
                    <li><a href="#">{{(date("F j",strtotime($pp->datum)))}}</a></li>
                </ul>
            </div>
            <div class="details mt-20">
                <a href="{{route("showpost",["id"=>$pp->idArtikla])}}">
                    <h6>{{$pp->naslov}}</h6>
                </a>
            </div>
        </div>

