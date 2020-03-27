@extends("layouts.admin")

@section("content")
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Account</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                @isset($form)
                                    @switch($form)
                                        @case('insert')
                                            @include("admin.component.users.createUserForm")
                                        @break
                                        @case('edit')
                                            @include("admin.component.users.editUserForm")
                                        @break
                                    @endswitch
                                @endisset
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endsection
