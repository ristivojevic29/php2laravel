@extends("layouts.admin")

@section("content")

    <div class="row">
        @isset($form)
        @switch($form)
            @case('insert')
             @include("admin.component.posts.insertPostForm")
            @break
            @case('edit')
            @include("admin.component.posts.updatePostsForm")
            @break
            @endswitch
        @endisset
        @switch($form)
            @case('insert')
        <div class="col-lg-3 col-md-12">
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Categories</h6>
                </div>
                <div class='card-body p-0'>

                    <ul class="list-group list-group-flush">
                        @include("admin.component.posts.insertCategoryForm")
                    </ul>
                </div>
            </div>
            <!-- / Post Overview -->
        </div>
            @break
            @endswitch
    </div>
    @endsection
@section("scripts")
    @parent
    <script src="{{asset("js/admin.js")}}" type="text/javascript"></script>

@endsection
