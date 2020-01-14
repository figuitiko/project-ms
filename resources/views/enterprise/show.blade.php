@extends('layouts.app')
@section('titulo')
    Listar productos
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <div class="links">
                    <a href="{{route('enterprise.create')}}" class="btn btn-primary">Nueva Empresa</a>
                </div>
                <br>
                <div class="card">
                    <div class="card-header"><i class="fas fa-eye"></i> Datos de la Empresa</div>
                    <div class="card-body">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="width: 20%;">Nombre de la Empresa</th>
                                <th style="width: 24%;">{{$enterprise->name}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Razón Social</th>
                                <th style="width: 24%;">{{$enterprise->social_reason}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Cantidad de Trabajadores</th>
                                <th style="width: 24%;">{{$enterprise->worker_amount}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">RFC</th>
                                <th style="width: 24%;">{{$enterprise->rfc}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Teléfono</th>
                                <th style="width: 24%;">{{$enterprise->phone}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Actividad Principal</th>
                                <th style="width: 24%;">{{$enterprise->activity}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Guia que Le Pertenece</th>
                                <th style="width: 24%;">{{$enterprise->guide->description}}</th>
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
