@extends('layouts.app')
@section('titulo')
    Listar productos
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <div class="links">
                    <a href="{{route('producto.createForm')}}" class="btn btn-primary">Nuevo producto</a>
                </div>
                <br>
                <div class="card">
                    <div class="card-header"><i class="fas fa-eye"></i> Detalle de producto</div>
                    <div class="card-body">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="width: 20%;">Nombre</th>
                                <th style="width: 24%;">{{$producto->nombre}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Color</th>
                                <th style="width: 24%;">{{$producto->color->nombre}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Marca</th>
                                <th style="width: 24%;">{{$producto->marca->nombre}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Modelo</th>
                                <th style="width: 24%;">{{$producto->modelo->nombre}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Medida</th>
                                <th style="width: 24%;">{{$producto->medida->diametro_lente.'-'.
                                                  $producto->medida->ancho_puente.'/'.$producto->medida->longitud_lateral}}
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Inventario</th>
                                <th style="width: 24%;">{{$producto->inventario}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Categoría</th>
                                <th>{{ $producto->categoria->nombre }}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Género</th>
                                <th>{{ $producto->genero->nombre }}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Material del armazón</th>
                                <th>{{ $producto->material->nombre }}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Material del lente</th>
                                <th>{{ $producto->material_lente->nombre }}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Forma del marco</th>
                                <th>{{ $producto->forma_marco->nombre }}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Estilo del armazón</th>
                                <th>{{ $producto->estilo->nombre }}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Cantidad del producto en almacén</th>
                                <th>{{ $cantidadProductoPorId->cantidad }}</th>
                            </tr>
                             </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Script to Activate the Carousel -->
{{--@section('custom_script')
    <script>
        $('#datatable-responsive').DataTable({
            "iDisplayLength": 25,
            "columnDefs": [
                {"width": "5%",targets:[1]},
                {"width": "10%",targets:[2]},
                {"width": "50%",targets:[3]},
                {"width": "20%",targets:[4]},
                {"width": "10%",targets:[5]},
                {"width": "1%", targets:[6]},
                {"width": "1%", targets:[7]},
            ]
        });
    </script>
@endsection--}}
