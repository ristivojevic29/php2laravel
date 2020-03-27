<div class="col-lg-9 col-md-12">
    <!-- Add New Post Form -->
    <div class="card card-small mb-3">
        <div class="card-body">
            @if(session('success'))
                {{session("success")}}
            @endif
            <form action="{{ route("posts.insertpost") }}" method="post" class="add-new-post" enctype="multipart/form-data">
                @csrf
                <input class="form-control form-control-lg mb-3" type="text" name="title" placeholder="Your Post Title">
                <input type="file" id="slika" name="slika" class="form-control form-control-lg mb-3"/>

                Category  <select id="ddKat" name="ddKat">
                    <option value="0">Choose...</option>
                    @foreach($kategorije as $k)
                        @component("admin.component.posts.oneCategory",["k"=>$k])
                        @endcomponent
                    @endforeach
                </select>

                <div id="editor-container" class="add-new-post__editor mb-1">
                    <textarea class="form-control form-control-lg mb-3" rows="5"  name="postText" id="postText" placeholder="Text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Text'" required=""></textarea>
                </div>


                <button type="submit" class="btn btn-accent" id="createPost">Create Post</button>

                <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace( 'postText', {
                        on: {
                            instanceReady: function( ev ) {
                                // Output paragraphs as <p>Text</p>.
                                this.dataProcessor.writer.setRules( 'p', {
                                    indent: false,
                                    breakBeforeOpen: true,
                                    breakAfterOpen: false,
                                    breakBeforeClose: false,
                                    breakAfterClose: true,

                                });

                            }


                        }

                    } );
                </script>

            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <!-- / Add New Post Form -->
</div>
