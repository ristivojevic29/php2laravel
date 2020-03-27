@extends("layouts.admin")

@section("content")
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Active Users</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">First Name</th>
                            <th scope="col" class="border-0">Last Name</th>
                            <th scope="col" class="border-0">tekst</th>
                            <th scope="col" class="border-0">vreme</th>
                            <th scope="col" class="border-0">ID artikla</th>
                            <th scope="col" class="border-0">Options</th>

                        </tr>
                        </thead>
                        <tbody id="komentariTabela">
                        @foreach($komentari as $k)
                            @component("admin.component.comments.commentTable",["k"=>$k])
                            @endcomponent
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section("scripts")
    @parent
    <script src="{{asset("js/admincomment.js")}}"></script>
    @endsection
