@extends('layouts.app')
@section('titulo')
    Listar Guías
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
{{--                <div class="links">--}}
{{--                    <a href="{{route('guide.create')}}" class="btn btn-primary">Nueva Guia</a>--}}
{{--                </div>--}}
                <div class="links">
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus"></i>  Crear Nueva Guía
                    </button>
                </div>
                <br>
                @if(Session::has('menssage'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        {{ Session::get('menssage') }}
                    </div>
                @endif
                <div id="activate-msg" class="visible-msg alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                     Se ha activado una guia
                </div>
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-table"></i>Lista de Guías</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="width: 5%;">No </th>
                                    <th style="width: 30%;">Titulo</th>
                                    <th style="width: 30%;">Liga</th>
                                    <th style="width: 30%;">Tipo</th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 20%;"></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($guides as $clave => $guide)
                                    <tr>
                                        <td>{{$counter = $counter+1}}</td>
                                        <td>{{$guide->title}}</td>
                                        <td>
                                            @if($guide->link and $guide->is_activated)
                                            <a id="guide-link"  target="_blank" href="

                                         {{$app['url']->to('/')}}{{$guide->link}}">

                                                {{ $guide->link ? $guide->link : '' }}    </a>
                                                @else
                                                <span> No hay Liga disponible aun</span>
                                            @endif
                                                &nbsp;&nbsp;
                                            @if($guide->link)
                                            <i style="cursor: context-menu" title="copie la liga" class="fas fa-copy" ></i>
                                                @endif

                                        </td>

                                        <td>{{$guide->guideType->name}}</td>
{{--                                        <div class="form-label-group">--}}
{{--                                            <select class=" form-control" id="color" name="color" >--}}
{{--                                                <option value="{{$producto->color->id}}" selected>{{$producto->color->nombre}}</option>--}}
{{--                                                @foreach($colores as $clave => $color)--}}
{{--                                                    <option value="{{$color->id}}">{{$color->nombre}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
                                        <td class="cell-center">
                                            <a href="{{ route('guide.edit',  $guide)}}" class="fa fa-edit"
                                               title="Editar  Guia"></a></td>
                                        <td class="cell-center">
                                            <a href="{{route('guide.show', $guide)}}" class="fa fa-eye"
                                               title="Ver detalle"></a></td>

                                        <td class="cell-center">
                                            <form method="POST"
                                                  action="{{ route('guide.destroy', $guide) }}"
                                                  style="display: inline">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger"
                                                        onclick="return confirm('¿Estás seguro de querer eliminar esta Guia?')"
                                                ><i class="fa fa-times"></i></button>
                                            </form>



                                        </td>
                                        <td class="cell-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-activated"  data-guide="{{$guide}}">
                                                {{$guide->is_activated ? 'Desactivar' : 'Activar' }}
                                            </button></td>


                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th style="width: 5%;">No </th>
                                    <th style="width: 30%;">Título</th>
                                    <th style="width: 30%;">Liga</th>
                                    <th style="width: 30%;">Tipo</th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 5%;"></th>
                                    <th style="width: 5%;"></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <form method="POST" action="{{ route('guide.store') }}">
                                {{ csrf_field() }}
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                                            <h4 class="modal-title text-center" id="myModalLabel">Agrega los Datos de la nueva Guia</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                {{-- <label>Título de la publicación</label> --}}
                                                <input id="post-title" name="title"
                                                       class="form-control"
                                                       value="{{ old('title') }}"
                                                       placeholder="Ingresa aquí el titulo de la Guia" autofocus required>
                                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Descripción </label>
                                                <div class="form-label-group">
                                                    {{--                        <input type="text" id="inventario" name="inventario" class=" form-control"  autofocus value="{{ old('inventario') }}">--}}
                                                    <textarea class="form-control" name="description">{{old('description')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Tipos</label>
                                                <div class="form-label-group">
                                                    <select class="custom-select" name="guide_type_id" >
                                                        @foreach($types as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button class="btn btn-primary">Crear Guia</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="card-footer small text-muted"></div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="modal-activated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form id="activar_guide">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineCheckbox1">Activar</label>
                            <div class="form-label-group">
                            <input class="form-check-input" type="checkbox" id="activated-guide" value="option1" name="activated-guide">
                            </div>

                        </div>
                            <div class="form-group">
                                <label class="control-label">Empresas</label>
                                <div class="form-label-group">
                                    <select  id="enterprise-active" class="custom-select" name="enterprises" >
                                        @foreach($enterprises  as $enterprise)
                                            <option value="{{$enterprise->id}}">{{$enterprise->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="modal-activate" data-token="{{ csrf_token() }}"   type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection

@push('scripts')

    <script src="{{ asset('js/admin/guide-index.js') }}"></script>
    <script>
        if ( window.location.hash === '#create') {
            $('#myModal').modal('show');
        }

        $('#myModal').on('hide.bs.modal', function(){
            window.location.hash = '#';
        });

        $('#myModal').on('shown.bs.modal', function(){
            $('#post-title').focus();
            window.location.hash = '#create';
        });
    </script>
@endpush
