<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Register | Website Manajemen Inventory
        </title>
    </head>
    @extends('layouts.app')

    @section('content')
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto rounded-3 shadow">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-center">
                                    <img alt="Logo PT. BIGS" sizes="120x120" src="{{ asset('img/logo.png') }}">
                                    <br />
                                    <br />
                                    <h4 class="font-weight-bolder">Register</h4>
                                    <p class="mb-0">Website Manajemen Inventory</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Nama" required autocomplete="nama" autofocus>
                                            @error('nama') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" aria-label="Email" placeholder="Email" required autocomplete="email" autofocus>
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="number" id="nomor_hp" name="nomor_hp" class="form-control form-control-lg @error('nomor_hp') is-invalid @enderror" value="{{ old('nomor_hp') }}" aria-label="Nomor HP" placeholder="Nomor HP (cth. 0812)" required autocomplete="nomor_hp" autofocus>
                                            @error('nomor_hp') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" aria-label="Password" placeholder="Password" required autocomplete="new-password">
                                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" class="form-control form-control-lg @error('password') is-invalid @enderror" aria-label="Password" placeholder="Confirm Password" required autocomplete="new-password">
                                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-rounded btn-lg w-100 mt-4 mb-0">{{ __('Register') }}</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-1 text-sm mx-auto">Sudah punya akun?
                                        <a href="{{ url('login') }}" class="text-primary text-gradient font-weight-bold">Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <h6 style="text-align: center;">Powered by:</h6>
                    <center>
                        <img alt="Logo Tokopedia" src="{{ asset('img/logo-tokped.png') }}" height="40px">
                    </center>
                </div>
            </div>
        </section>
    </main>

    </html>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @endsection