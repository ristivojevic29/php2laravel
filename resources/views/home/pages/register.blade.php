@extends("layouts.layout")

@section("content")
    <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-home"></i></span>
                <div class="media-body">
                    <h3>California United States</h3>
                    <p>Santa monica bullevard</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                <div class="media-body">
                    <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
                    <p>Mon to Fri 9am to 6pm</p>
                </div>
            </div>

        </div>
        <div class="col-md-8 col-lg-9">
            <form action="{{url("/register")}}" class="form-contact contact_form"  method="POST" id="contactForm">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <input class="form-control" name="hiddenToken" id="hiddenToken" type="hidden" value="{{csrf_token()}}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="tbFirstName" id="tbFirstName" type="text" placeholder="Enter your first name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="tbLastName" id="tbLastName" type="text" placeholder="Enter your last name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="tbEmail" id="tbEmail" type="email" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="tbPassword" id="tbPassword" type="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="tbRePassword" id="tbRePassword" type="password" placeholder="Re-password">
                        </div>
                    </div>

                </div>
                <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" name="btnRegister" id="btnRegister" class="button button--active button-contactForm">Register</button>
                </div>
            </form>
                <p>Already have an account? Login <a href="{{ url("/login") }}">here</a>. </p>
                @isset($errors)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get("success") }}
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get("error") }}
                    </div>
                @endif
                    <div class="greske">

                    </div>


        </div>
    </div>
    @endsection
@section("scripts")
    @parent

    <script type="text/javascript" src="{{asset("js/register.js")}}"></script>
    @endsection
