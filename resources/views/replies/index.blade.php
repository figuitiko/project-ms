@extends('layouts.app')
@section('titulo')
    Listar de Respuestas
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="links">
                    <a href="{{route('replies.create')}}" class="btn btn-primary">Nueva Respuesta</a>
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
                    <div class="card-header"><i class="fas fa-table"></i> Lista de accesorios</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="width: 5%;">No </th>
                                    <th style="width: 30%;">Contenido</th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 5%;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($replies as $key => $reply)
                                    <tr>
                                        <td>{{$counter = $counter+1}}</td>
                                        <td>{{$reply->content}}</td>

                                        <td class="cell-center">
                                            <a href="{{route('replies.edit', $reply)}}" class="fa fa-edit"
                                               title="Editar el Accesorio"></a></td>
                                        <td class="cell-center">
                                            <form method="POST"
                                                  action="{{ route('replies.destroy', $reply) }}"
                                                  style="display: inline">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger"
                                                        onclick="return confirm('¿Estás seguro de querer eliminar esta esta respuesta?')"
                                                ><i class="fa fa-times"></i></button>
                                            </form></td>
{{--                                        <td class="cell-center">--}}
{{--                                            <a href="{{route('replies.show', $reply)}}" class="fa fa-eye"--}}
{{--                                               title="Ver detalle"></a></td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th style="width: 5%;">No </th>
                                    <th style="width: 30%;">Contenido</th>
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
