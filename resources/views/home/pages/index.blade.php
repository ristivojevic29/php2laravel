@extends('layouts.layout')

@section("title","Home")
@section("slajderPostova")
    <div class="container">
        <div class="owl-carousel owl-theme blog-slider">
    @foreach($slajderArtikli as $sa)
    @component("home.components.sliderPosts",["sa"=>$sa])
    @endcomponent
    @endforeach
        </div>
    </div>

@endsection


@section("content")
    @foreach($artikli as $a)
    @component("home.components.eachPost",["a"=>$a])

@endcomponent
@endforeach

        @include("home.components.pagination")

    @endsection

        @section('category')
            @include('home.components.common.category')
        @endsection
        @section('newsletter')
            @include("home.components.newsletter")
        @endsection
        @section("popularPosts")
            <div class="single-sidebar-widget popular-post-widget">
                <h4 class="single-sidebar-widget__title">Popular Post</h4>
                <div class="popular-post-list">
                    @foreach($popularniPostovi as $pp)
                    @component("home.components.popularPosts",["pp"=>$pp])
                        @endcomponent
                        @endforeach
                </div>
            </div>
            </div>
        @endsection

    @section("scripts")
    @parent
                <script src="{{asset("js/home.js")}}" type="text/javascript"></script>
    @endsection
