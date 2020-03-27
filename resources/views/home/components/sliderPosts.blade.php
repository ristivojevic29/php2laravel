<div class="card blog__slide text-center">
            <div class="blog__slide__img">
                <img class="card-img rounded-0" src="{{asset($sa->putanja_slike)}}" alt="{{$sa->naslov}}">
            </div>
            <div class="blog__slide__content">
                <a class="blog__slide__label" href="{{url('/post/'.$sa->idArtikla)}}">{{$sa->naziv_kategorije}}</a>
                <h3><a href="{{url('/post/'.$sa->idArtikla)}}">{{$sa->naslov}}</a></h3>
                <p>{{date('F d, Y H:i A', strtotime($sa->datum))}}</p>
            </div>
        </div>
