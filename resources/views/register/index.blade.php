@extends('layouts.main');

@section('container')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-signup w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                        id="name" placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Email@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" name="no_phone" class="form-control @error('no_phone') is-invalid @enderror"
                        id="no_phone" placeholder="no_phone@example.com" required value="{{ old('no_phone') }}">
                    <label for="no_phone">Number Phone</label>
                    @error('no_phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating border">
                    <fieldset class="row mb-1">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                    checked>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="form-floating">
                    <input type="password" name="password"
                        class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                        placeholder="password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign Up</button>
            </form>
            <small class="d-block text-center mt-3">Already registered? <a href="/login">Sign In</a></small>
        </main>
    </div>
</div>



</body>

</html>

@endsection