@extends("layouts.admin")

@section("content")
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Navigation</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">ID</th>
                            <th scope="col" class="border-0">Name</th>
                            <th scope="col" class="border-0">Route</th>
                            <th scope="col" class="border-0">Options</th>
                        </tr>
                        </thead>
                        <tbody id="navigacijaTabela">
                        @foreach($navigacija as $n)
                            @component("admin.component.navigation.navTable",["n"=>$n])
                            @endcomponent
                        @endforeach
                        </tbody>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <input type="text" name="tbNazivRute" id="tbNazivMenija"/>
                            </td>
                            <td>
                                <input type="text" name="tbNazivRute" id="tbNazivRute"/>
                            </td>
                            <td>
                                <a href="" style="color:black" class="dodajMeni"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </td>

                        </tr>
                    </table>
                </div>
                <div id="formaZaUpdate" class="col-lg-3 col-md-12">
                    <div class='card card-small mb-3'>
                        <div class="card-header border-bottom">
                            <h6 class="m-0">Update Navigation</h6>
                        </div>
                        <div class='card-body p-0'>

                            <ul class="list-group list-group-flush">
                                @include("admin.component.navigation.updateNavForm")
                            </ul>
                        </div>
                    </div>
                    <!-- / Post Overview -->
                </div>
            </div>
        </div>
    </div>
    @endsection
@section("scripts")
    @parent
    <script src="{{asset("js/navigacija.js")}}" type="text/javascript"></script>
    @endsection
