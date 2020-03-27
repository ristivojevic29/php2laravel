<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
    <div class="card card-small card-post card-post--1">
        <div class="card-post__image" style="background-image:url('{{asset($a->putanja_slike)}}');">
            <a href="{{ route("posts.show", ['id' => $a->idArtikla]) }}" class="card-post__category badge badge-pill badge-dark">{{$a->naziv_kategorije}}</a>

        </div>
        <div class="card-body">
            <h5 class="card-title">
                <a class="text-fiord-blue" href="{{ route("posts.show", ['id' => $a->idArtikla]) }}">{{$a->naslov}}</a>
            </h5>
            <span class="text-muted">{{date('j F Y', strtotime($a->datum))}}</span>
           <span><a href="" data-id="{{$a->idArtikla}}" class="btnObrisi">Delete</a></span>
            <span><a href="{{ route("posts.show", ['id' => $a->idArtikla]) }}" data-id="{{$a->idArtikla}}" class="btnUpade">Update</a></span>
        </div>
    </div>

</div>
