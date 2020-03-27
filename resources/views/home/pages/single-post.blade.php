@extends("layouts.layout")

@section('content')
    @foreach($singlePost as $s)
    @component("home.components.post",["s"=>$s,"comments"=>$comments])
    @endcomponent
@endforeach

    <div class="comments-area">
        <h4 id="brojKomentara">{{count($comments)}} Comments</h4>

             @foreach($comments as $k)
            @if($k->idKomentarParent==0)
                <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="img/blog/c1.jpg" alt="">
                            </div>
                            <div class="desc">
                                <h5><a href="#">{{$k->ime_korisnika}} {{$k->prezime_korisnika}}</a></h5>
                                <p class="date">{{date('F d, Y  H:i A', strtotime($k->vreme))}}</p>
                                <p class="comment">
                                    {!! $k->tekst !!}
                                </p>

                            </div>
                        </div>
                        <div class="reply-btn">
                            <a href="" data-id="{{$k->idKomentara}}" class="btn-reply text-uppercase">reply</a>
                        </div>

                    </div>
                </div>
            @endif
                @foreach($comments as $c)
                    @if($c->idKomentarParent!=0 && ($c->idKomentarParent==$k->idKomentara))

                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c2.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">{{$c->ime_korisnika}} {{$c->prezime_korisnika}}</a></h5>
                                    <p class="date">{{date('F j, Y  H:i A', strtotime($c->vreme))}} </p>
                                    <p class="comment">
                                        {!!$c->tekst!!}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
                    @endforeach
        @endforeach
    </div>
    @if(session()->get('user'))
        @include('home.components.commentsForm')
    @else
        <h4> <a href="{{url("/login")}}">Login</a> to comment.</h4>
    @endif

    @endsection
@section("scripts")
    @parent
    <script src="{{asset("js/comment.js")}}" type="text/javascript"></script>
    @endsection
