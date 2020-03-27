@if(session('success'))
    {{session("success")}}
@endif
<form method="POST" action="{{route("user.store")}}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="feFirstName">First Name</label>
            <input type="text" class="form-control" id="tbFirstName" name="ime_korisnika" placeholder="First Name"> </div>
        <div class="form-group col-md-6">
            <label for="feLastName">Last Name</label>
            <input type="text" class="form-control" id="tbLastName" name="prezime_korisnika" placeholder="Last Name" > </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="feEmailAddress">Email</label>
            <input type="email" class="form-control" id="tbEmail" name="email" placeholder="Email"> </div>
        <div class="form-group col-md-6">
            <label for="fePassword">Password</label>
            <input type="password" class="form-control" id="lozinka" name="lozinka" placeholder="Password"> </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="feInputState">Role</label>
            <select id="feInputState" name="uloge_id" class="form-control">
                <option selected>Choose...</option>
                @foreach($uloge as $u)
                    @component("admin.component.users.uloga",["u"=>$u])
                        @endcomponent
                @endforeach
            </select>
        </div>

    </div>

    <button type="submit" class="btn btn-accent">Create Account</button>
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
