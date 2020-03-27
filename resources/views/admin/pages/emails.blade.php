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
                            <th scope="col" class="border-0">ID</th>
                            <th scope="col" class="border-0">Name</th>
                            <th scope="col" class="border-0">Email</th>
                            <th scope="col" class="border-0">Subject</th>
                            <th scope="col" class="border-0">Message</th>
                            <th scope="col" class="border-0">Date</th>
                            <th scope="col" class="border-0">Options</th>

                        </tr>
                        </thead>
                        <tbody id="emailTabela">
                        @foreach($emails as $e)
                            @component("admin.component.emails.tableMail",["e"=>$e])
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
        <script src="{{asset("js/email.js")}}"></script>
    @endsection
