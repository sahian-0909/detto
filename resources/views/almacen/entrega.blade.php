@extends('layouts.admin')
@section('titulo', 'Muestrario')
@section('contenido')
@foreach ($almacen as $almacen)
<div class="row my-1">
    <div class="col-9">
        <h3 class="fs-4 mb-3">Detalles de Salida</h3>
    </div>
</div>
<form action="{{ url('almacen/devolucion/'.$almacen->folio)}}" method="post">
    @csrf
    @method('put')
    <input type="hidden" name="folio" value="{{ $almacen->folio }}">
    <div class="row my-1">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <b>{{$almacen->nombre_compania}}</b> <br>
                <b>Representante:</b> {{$almacen->nombre_contacto}} | Telefono: {{$almacen->telefono_contacto}} |
                Correo: {{ $almacen->correo_contacto}}
                <p><b>Datos de Domicilio:</b> {{$almacen->domicilio_compania}} <br>
                    <b>Estatus: </b>
                    <select name="estatus" id="" class="form-control form-control-sm">
                        <option value="0">Pendiente</option>
                        <option value="1">Entregado</option>
                    </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <p><b>Detto Uniformes S.A de C.V</b></p>
                <b>Fecha/Hora de Elaboración:</b> {{$almacen->fecha_creacion}} <br>
                <b>Elaborado por:</b> {{$almacen->name}} {{$almacen->app}} <br>
                <b>Tipo de Salida</b> {{ $almacen->tipo}} <br>
                <b>Autorizado: </b> @if($almacen->autorizado == 0 ) No @else Si @endif <br>

            </div>
        </div>
    </div>
    <hr>
    <div class="row my-1">
        <div class="col">
            <div class="table-responsive">
                <table class="table bg-white rounded shadow-sm  table-hover">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Devolución</th>
                            <th scope="col" width="50">Cód.</th>
                            <th scope="col">Unidad</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Comentarios de Entrega</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($detalles as $detalle)
                        <tr class="text-center">
                            <td>
                                <input type="hidden" name="id_detalle[]" value="{{ $detalle->id_detalle}} "> 
                                <select name="devolucion[]" id="" class="form-select form-sm">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </td>
                            <td>{{ $detalle->codigo }}</td>
                            <td>{{ $detalle->unidad }}</td>
                            <td>{{ $detalle->descripcion }}</td>
                            <td> <input type="text" name="comentariosEntrega[]" id=""
                                    class="form-control form-control-sm" value="Sin Com."> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <input type="submit" value="Entregar" class="btn btn-success">
    </div>
</form>
@endforeach
@endsection
