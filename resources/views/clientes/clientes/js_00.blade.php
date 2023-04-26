<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('imagenes/clientes/'.$cliente->fotoCliente) }}" class="img-fluid rounded-start"
                alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $cliente->nombre_compania }}</h5>
                <p class="card-text">
                    <b>Contacto: </b> {{ $cliente->nombre_contacto }}
                    <br> <b>Puesto: </b> {{ $cliente->puesto_contacto }}
                    <br> <b>Email Clte: </b> {{ $cliente->correo_compania }}
                    <br> <b>Email Cto: </b> {{ $cliente->correo_contacto }}
                    <br> <b>Tel. Clte: </b> {{ $cliente->telefono_compania }}
                    <br> <b>Tel. Cto: </b> {{ $cliente->telefono_contacto }}
                    <br> <b>Domicilio: </b> {{ $cliente->domicilio_compania }}
                    <hr>
                </p>
                <p class="card-text">
                    @can('cliente_show')
                    <a href="{{url('clientes/detalles/'. $cliente->id_cliente)}}" class="btn btn-warning"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                            @endcan
                            @can('cliente_destroy')
                    <a href="{{url('clientes/eliminar/'. $cliente->id_cliente)}}" class="btn btn-danger"><i
                            class="fa-solid fa-trash"></i></a>
                            @endcan
                            @can('cliente_archivar')
                    <a href="{{url('clientes/desactivar/'. $cliente->id_cliente)}}" class="btn btn-secondary"><i
                            class="fa-solid fa-clock"></i></a>
                            @endcan
                </p>
            </div>
        </div>
    </div>
</div>
{{-- <div class="card">
    <h5 class="card-header">{{ $cliente->nombre_compania }}</h5>
<div class="card-body">
    <h5 class="card-title">{{ $cliente->razon_social }}</h5>
    <b>Contacto: </b> {{ $cliente->nombre_contacto }}
    <br> <b>Puesto: </b> {{ $cliente->puesto_contacto }}
    <br> <b>Email Clte: </b> {{ $cliente->correo_compania }}
    <br> <b>Email Cto: </b> {{ $cliente->correo_contacto }}
    <br> <b>Tel. Clte: </b> {{ $cliente->telefono_compania }}
    <br> <b>Tel. Cto: </b> {{ $cliente->telefono_contacto }}
    <br> <b>Domicilio: </b> {{ $cliente->domicilio_compania }}
    <hr>
    <a href="{{url('clientes/detalles/'. $cliente->id_cliente)}}" class="btn btn-warning"><i
            class="fa-solid fa-pen-to-square"></i></a>
    <a href="{{url('clientes/eliminar/'. $cliente->id_cliente)}}" class="btn btn-danger"><i
            class="fa-solid fa-trash"></i></a>
    <a href="{{url('clientes/desactivar/'. $cliente->id_cliente)}}" class="btn btn-secondary"><i
            class="fa-solid fa-clock"></i></a>
</div>
</div> --}}
