<div class="comment-form">
    <h4 class="leaveacom" style="cursor:pointer;">Leave a Comment</h4>

    <form action="" method="post">
        @csrf
        <div class="form-group">
            <textarea class="form-control mb-10" rows="5"  name="message" id="message" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" id="hiddenIdArticle" value="{{$s->idArtikla}}"/>
        </div>

        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'message', {
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
        <div class="form-group replyDugme">
            <button  type="submit" class="button submit_btn replyBtn">Reply</button>
        </div>
        <div class="form-group commentDugme">
            <button  type="submit" class="button submit_btn dugme">Post Comment</button>
        </div>



    </form>
</div>
</div>
