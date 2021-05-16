@extends('layouts.app')
@section('titulo')
   Listar Empresas
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <div class="links">
                    <a href="{{route('enterprise.create')}}" class="btn btn-primary">Nueva Empresa</a>
                </div>

                <div id="basic_data" class="card mt-5">
                    <div class="card-header"><i class="fas fa-eye"></i> Datos de la Empresa</div>
                    <div class="card-body">
                        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
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
                                <th style="width: 20%;">Cantidad a  Encuestar</th>
                                <th style="width: 24%;">{{$enterprise->surveyed_amount}}</th>
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


                            <th style="width: 20%;">Guia que Le Pertenece</th>
                            <td>
                                @forelse($enterprise->guides as $guide)
                                    {{$guide->title}},&nbsp;
                                @empty
                                    <span>no tiene guias</span>
                            </td>




                            @endforelse


                            </thead>
                        </table>





                    </div>
                </div>

            {{----------------------botones--------------------------------------------}}
                @include('enterprise.partial-buttons')
                <br>

                {{--------------------------------Applied guides  -------------------}}

                @include('enterprise.partial-guides')


                {{------------------------------table the one that are saying yes-------------------}}

                @include('enterprise.partial-yes')


                {{------------------      --------------table the one that are saying yes-------------------}}
                @include('enterprise.partial-yes-count')
                {{------------------      --------------Graficos-------------------}}
                @include('enterprise.partial-chart')

                {{------------------      --------------table the one that are saying reports-------------------}}

               @include('enterprise.partial-total')

                {{------------------      --------------Categorias -------------------}}

                @include('enterprise.partial-categories')

                {{--------------------------------Dom Dimensions -------------------}}

                @include('enterprise.partial-domains')





            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script src="{{ asset('js/admin/enterprise.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>

@endpush
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
