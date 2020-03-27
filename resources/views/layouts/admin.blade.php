<!doctype html>
<html class="no-js h-100" lang="en">
@include("admin.component.common.head")
<body class="h-100">
<div class="container-fluid">
    <div class="row">

        <!-- Main Sidebar -->
       @component("admin.component.common.sidebar",["meni"=>$adminMeni])
           @endcomponent
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="main-navbar sticky-top bg-white">
                <!-- Main Navbar -->
               @include("admin.component.common.nav")
            </div>
            <!-- / .main-navbar -->
            <div class="main-content-container container-fluid px-4">
                <!-- Page Header -->
                <!-- End Page Header -->
                <!-- Small Stats Blocks -->
              @yield("content")
            </div>
        @include("admin.component.common.footer")
</body>
</html>
