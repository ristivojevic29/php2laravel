<!DOCTYPE html>
<html lang="en">
 @include('home.components.common.head')

<body>
<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
           @component("home.components.common.nav",[
                "meni"=>$meni
            ])
               @endcomponent
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->

<main class="site-main">
    <!--================Hero Banner start =================-->
    <section class="mb-30px">
        <div class="container">
            <div class="hero-banner">
                <div class="hero-banner__content">
                    <h3>Tours & Travels</h3>
                    <h1>Amazing Places on earth</h1>
                    <h4>December 12, 2018</h4>
                </div>
            </div>
        </div>
    </section>
    <!--================Hero Banner end =================-->

    <!--================ Blog slider start =================-->
    <section>
      @yield('slajderPostova')
    </section>
    <!--================ Blog slider end =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                   @yield('content')
                </div>


                <!-- Start Blog Post Siddebar -->
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                            @yield('newsletter')
                            @yield("category")
                          @yield("popularPosts")

                        </div>


                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->

    </section>
    <!--================ End Blog Post Area =================-->
</main>

<!--================ Start Footer Area =================-->
@include("home.components.common.footer")
<!--================ End Footer Area =================-->


</body>
</html>
