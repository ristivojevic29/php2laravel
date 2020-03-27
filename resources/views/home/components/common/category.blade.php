

    <div class="single-sidebar-widget post-category-widget">
<h4 class="single-sidebar-widget__title">Category</h4>
<ul class="cat-list mt-20">


    @foreach($kategorije as $k)
        @component("home.components.oneCategory",["kat"=>$k])
            @endcomponent

        @endforeach
</ul>
    </div>


