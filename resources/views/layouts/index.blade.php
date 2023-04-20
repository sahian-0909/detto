<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Autor(es) de la página web --}}
    <meta name="author" content="Alex Donaldo Martínez Jiménez," />
    {{-- Autor de tutorial de Youtube --}}
    <meta name="copyright" content="Mathe. | Creative Coding Camp" />
    <meta http-equiv="cache-control" content="no-cache"/>

    <title>Detto Uniformes</title>

    <link rel="stylesheet" href="{{asset('src/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css
    ">
    <link rel="stylesheet" href="{{asset('src/styles.css')}}">
</head>

<body>


    <header>

        <div class="container-fluid">

            <div class="navb-logo">
                <img src="{{asset('src/img/logo_detto.png')}}" alt="Logo">
            </div>

            <div class="navb-items d-none d-xl-flex">

                {{-- <div class="item">
                    <a href="/">Inicio</a>
                </div> --}}

                <div class="item">
                    <a href="/services">Nosotros</a>
                </div>

                <div class="item">
                    <a href="/cases">Contáctanos</a>
                </div>

                <div class="item">
                    <a href="/about">Catálogo</a>
                </div>

                @if (Route::has('login'))
                <div class="item-button">
                    @auth
                        <a href="{{ url('/home') }}">Panel Detto</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar sesión</a>
                    @endif
                </div>
                @endif
            </div>

            <!-- Button trigger modal -->
            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <img src="{{asset('src/img/footer_logo_detto.png')}}" alt="Logo">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="fa-solid fa-xmark"></i></button>
                        </div>

                        <div class="modal-body">

                            {{-- <div class="modal-line">
                                <i class="fa-solid fa-house"></i><a href="/">Inicio</a>
                            </div> --}}

                            <div class="modal-line">
                                <i class="fa-sharp fa-solid fa-users"></i><a href="/services">Nosotros</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa-solid fa-address-book"></i><a href="/cases">Contáctanos</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa-solid fa-book-open"></i><a href="/about">Catálogo</a>
                            </div>

                            <a href="/contact" class="navb-button" type="button">Inicio</a>
                        </div>

                        <div class="mobile-modal-footer">

                            <a target="_blank" href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a target="_blank" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a target="_blank" href="#"><i class="fa-brands fa-youtube"></i></a>
                            <a target="_blank" href="#"><i class="fa-brands fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </header>
    {{-- Contenido --}}
    @yield('contenido')
    <br>
    {{-- Footer --}}
    <footer class="footer py-4">
        <div class="container">
            <nav class="row">
                <a href="" class="col-xs-12 col-md-6 col-lg-3 text-reset text-uppercase d-flex align-items-center">
                    <img src="{{asset('src/img/footer_logo_Detto.png')}}" alt="" class="img-logo mr-2" height="50px" height="auto">
                </a>
                <ul class="col-xs-12 col-md-6 col-lg-3 list-unstyled">
                    <li class="font-weight-bold text-uppercase">Detto Uniformes</li>
                    <li class="text-muted">Puerto San Blas 19, San Jeronimo Chicahualco, 52170 Metepec, Edo de Méx.</li>
                    <li><a href="tel:+527226729504" class="text-reset">722-625-35-09</a></li>
                    <li><a href="#" class="text-reset">ventas@dettouniformes.com</a></li>
                </ul>
                <ul class="col-xs-12 col-md-6 col-lg-3 list-unstyled">
                    <li class="font-weight-bold text-uppercase">Contenido</li>
                    <li><a href="#" class="text-reset">Inicio</a></li>
                    <li><a href="#" class="text-reset">Nosotros</a></li>
                    <li><a href="#" class="text-reset">Contáctanos</a></li>
                    <li><a href="#" class="text-reset">Catálogo</a></li>
                    <li><a href="#" class="text-reset">Mapa de Sitio</a></li>
                </ul>
                <ul class="col-xs-12 col-md-6 col-lg-3 list-unstyled">
                    <li class="font-weight-bold text-uppercase">Redes Sociales</li>
                    <li class="d-flex justify-content-between">
                        <a href="#" class="text-reset"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-reset"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="text-reset"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#" class="text-reset"><i class="fa-brands fa-whatsapp"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>



    {{-- <section class="section-1">

    </section> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js
    "></script>
</body>

</html>
