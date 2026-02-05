<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Include Compiled Styles --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    {{-- Font google --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- Bootstrap Library --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

</head>

<body>

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('{{ asset('images/beer.jpeg') }}');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif

                        @if ($errors->has('email'))
                            <div class="alert alert-dange">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                        <h3><strong>Beering</strong></h3>
                        <p class="mb-4">Todo lo relacionado a su bar lo podra controlar aca.</p>
                       
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control" placeholder="Ingrese su correo"
                                    id="username" name="email">
                                
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" placeholder="Ingrese su contraseña"
                                    id="password" name="password">

                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0 mx-3"><span class="caption">Recuerdame</span>
                                    <input type="checkbox" name="remember" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Olvido su password</a></span>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">
                                <i class="bi bi-key"></i>  Ingresar
                            </button>

                            <div class="d-flex mt-3 align-items-center">
                                <a href="{{ route('google.redirect') }}" class="btn btn-danger">
                                    <i class="bi bi-google"></i> Autenticación con Google
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    {{-- Jquery Library --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    {{-- Bootstrap Js Library --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous">
    </script>
</body>

</html>