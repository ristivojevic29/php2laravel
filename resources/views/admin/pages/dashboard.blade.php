@extends("layouts.admin")
@section("content")
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Blog Overview</h3>
        </div>
    </div>
<div class="row">
    @include("admin.component.dashboard.numberOfPosts")
    @include("admin.component.dashboard.numberOfComments")
    @include("admin.component.dashboard.numberOfUsers")

</div>
<!-- End Small Stats Blocks -->
<div class="row">
    <!-- Users Stats -->
    <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
        <div class="card card-small">
            <div class="card-header border-bottom">
                <h6 class="m-0">Active Users</h6>
            </div>
            <div class="card-body pt-0">
                <div class="row border-bottom py-2 bg-light">

                        <div class="card-body p-0 pb-3 text-center">
                            <table class="table mb-0">
                                <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0">ID</th>
                                    <th scope="col" class="border-0">First Name</th>
                                    <th scope="col" class="border-0">Last Name</th>
                                    <th scope="col" class="border-0">Email</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($aktivniKorisnici as $ak)
                                    @component("admin.component.dashboard.activeUsers",["ak"=>$ak])
                                        @endcomponent
                                    @endforeach


                                </tbody>
                            </table>
                        </div>


                </div>

            </div>
        </div>
    </div>
    <!-- End Users Stats -->
    <!-- Users By Device Stats -->

    <!-- End Users By Device Stats -->
    <!-- New Draft Component -->

    <!-- End New Draft Component -->
    <!-- Discussions Component -->

    <!-- End Discussions Component -->
    <!-- Top Referrals Component -->

    <!-- End Top Referrals Component -->
</div>
@endsection
