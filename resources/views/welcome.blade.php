@extends('layouts.index')
@section('contenido')
<div class="container">
    {{-- Carrusel  --}}
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.shopify.com/s/files/1/0405/9811/0367/articles/7_17_1024x1024.jpg?v=1611596411"
                    class="d-block w-100" alt="..." width="100%" height="100%">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.shopify.com/s/files/1/0405/9811/0367/articles/7_17_1024x1024.jpg?v=1611596411"
                    class="d-block w-100" alt="..." width="100%" height="100%">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.shopify.com/s/files/1/0405/9811/0367/articles/7_17_1024x1024.jpg?v=1611596411"
                    class="d-block w-100" alt="..." width="100%" height="100%">    
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    {{-- <div class="row">
        <video width="840" style="text-align: center;" controls autoplay>
            <source src="{{asset('src/vid/Detto_Comercial.mp4')}}" type="video/mp4">
                <i class="fa-solid fa-circle-exclamation"></i>
                Tu navegador no soporta HTML5 video !!
        </video>
    </div> --}}
    <br>
    <div class="card rounded-0">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 d-flex stat my-3">
                    <div class="mx-auto">
                        <div class="text-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/2554/2554812.png" alt="" width="50px" height="50px" style="text-align: center;">
                            <h4 class="font-weigth-bold text-primary">DISEÑO</h4>
                        </div>                            
                        <h6>Porque siempre hay diseños para todo, nos enfocamos en las necesidades de tu empresa y equipo de trabajo, para que puedan portar un uniforme con estilo.</h6>
                    </div>
                </div>
                <div class="col-lg-3 d-flex stat my-3">
                    <div class="mx-auto">
                        <div class="text-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/3056/3056361.png" alt="" width="50px" height="50px">
                            <h4 class="font-weigth-bold text-primary">NECESIDADES</h4>
                        </div>
                        <h6>Nos basamos en lo importante que es para ti y tus trabajadores sentirse cómodos a la hora de realizar sus labores con prendas de vestir adecuadas a sus actividades diarias.</h6>
                    </div>
                </div>
                <div class="col-lg-3 d-flex stat my-3">
                    <div class="mx-auto">
                        <div class="text-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/456/456212.png" alt="" width="50px" height="50px">
                            <h4 class="font-weigth-bold text-primary">IDENTIDAD</h4>
                        </div>
                        <h6>Verse bien es sentirse bien: ayudamos a generar un sentido de pertenencia de tus colaboradores hacia la empresa. El usar un uniforme con imagen aumenta la lealtad de los mismos.</h6>
                    </div>
                </div>
                <div class="col-lg-3 d-flex my-3">
                    <div class="mx-auto">
                        <div class="text-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/2959/2959013.png" alt="" width="50px" height="50px">
                            <h4 class="font-weigth-bold text-primary">FUNCIONALIDAD</h4>
                        </div>                            
                        <h6>Es importante conocer las funciones de cada uno de tus trabajadores para que realicen sus labores con una prenda cómoda, segura, adecuada a sus actividades.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection