@extends("layouts.admin")

@section("content")
    @if(session('success'))
        {{session("success")}}
    @endif
    <div id="sviArtikli" class="row">
        @foreach($artikli as $a)
            @component("admin.component.posts.onePost",["a"=>$a])
            @endcomponent
            @endforeach
    </div>
@endsection

@section("scripts")
    @parent
    <script src="{{asset("js/admin.js")}}"></script>
@endsection
