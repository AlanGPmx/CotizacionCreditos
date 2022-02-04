<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alan Garduño Pineda - Prueba Técnica</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }
    </style>
</head>

<body>
    <div class="container-fluid fixed-top p-4">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                @if (Route::has('login'))
                <div class="">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="text-muted">Log in</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                    @endif
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 pt-5 px-5">
        <div class="row justify-content-center px-4">
            <div class="col-md-12 col-lg-9">
                <img src="https://www.gruposalinas.com/Content/iconos/LogoGS-main.svg" width="100px" class="my-4" alt="">

                <div class="card shadow-sm">
                    <div class="row">

                        <div class="col-md-12 pl-0">
                            <div class="card-body p-3 h-100">
                                <div class="mb-2">
                                    <span class="h5 font-weight-bolder text-dark">&nbsp;Evaluación – Sistema de cotización de créditos</span>
                                </div>
                                <p class="text-muted small">
                                    En la dirección de Canales de terceros, se requiere realizar un pequeño sistema de cotización de productos a crédito, el cual debe contar con 3 secciones:
                                <ol>
                                    <li class="text-muted small">Sección de administración de productos.</li>
                                    <li class="text-muted small">Sección de administración de plazos.</li>
                                    <li class="text-muted small">Sección de cotización de créditos.</li>
                                </ol>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <div class="text-sm text-muted">
                        <div class="flex align-content-center">

                            <i class="fa fa-linkedin"></i>
                            <a href="https://www.linkedin.com/in/alangp/" class="text-muted">
                                LinkedIn
                            </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <i class="fa fa-github-square"></i>
                            <a href="https://github.com/AlanGPmx/" class="text-muted">
                                Github
                            </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <i class="fa fa-twitter"></i>
                            <a href="https://twitter.com/alangpmx" class="text-muted">
                                Twitter
                            </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>

                    <div class="text-sm ">
                        <a class="text-muted" href="">Documentación</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/186df2bc35.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>