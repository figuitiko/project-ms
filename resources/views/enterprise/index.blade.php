@extends('layouts.app')
@section('titulo')
    Listar de Empresas
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="links">
                    <a href="{{route('enterprise.create')}}" class="btn btn-primary">Nueva Empresa</a>
                </div>
                <br>
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-table"></i> Lista de Empresas</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="width: 5%;">No </th>
                                    <th style="width: 20%;">Nombre</th>
                                    <th style="width: 20%;">Razón Social</th>
                                    <th style="width: 20%;">Personas a Enquestar</th>
                                    <th style="width: 20%;">Cantidad de Trabajadores</th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 5%;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($enterprises as $key => $enterprise)
                                    <tr>
                                        <td>{{$counter = $counter+1}}</td>
                                        <td>{{$enterprise->name}}</td>
                                        <td>{{$enterprise->social_reason}}</td>
                                        <td>{{$enterprise->surveyed_amount}}</td>
                                        <td>{{$enterprise->worker_amount}}</td>
                                        <td class="cell-center">
                                            <a href="{{route('enterprise.edit', $enterprise)}}" class="fa fa-edit"
                                               title="Editar el Empresa"></a></td>
                                        <td class="cell-center">
                                            <a href="{{route('enterprise.show',$enterprise)}}" class="fa fa-eye"
                                               title="Ver detalle de la Empresa"></a></td>
                                        <td class="cell-center">
                                            <form method="POST"
                                                  action="{{ route('enterprise.destroy', $enterprise) }}"
                                                  style="display: inline">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger"
                                                        onclick="return confirm('¿Estás seguro de querer eliminar esta esta Empresa?')"
                                                ><i class="fa fa-times"></i></button>
                                            </form></td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th style="width: 5%;">No </th>
                                    <th style="width: 20%;">Nombre</th>
                                    <th style="width: 20%;">Razón Social</th>
                                    <th style="width: 20%;">Personas a Enquestar</th>
                                    <th style="width: 20%;">Cantidad de Trabajadores</th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 5%;"></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
