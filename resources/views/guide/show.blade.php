@extends('layouts.app')
@section('titulo')
    Listar productos
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
               {{-- <div class="links">
                    <a href="{{route('guide.create')}}" class="btn btn-primary">Nueva Guia</a>
                </div>--}}
                <br>
                <div class="card">
                    <div class="card-header"><i class="fas fa-eye"></i> Detalle de producto</div>
                    <div class="card-body">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="width: 20%;">Descripcion</th>
{{--                                {{dd($guide)}}--}}

                                <th style="width: 24%;">{{$guide->description}}</th>
                            </tr>


                            <tr>
                                <th style="width: 20%;">Tipo</th>
                                <th style="width: 24%;">{{$guide->guideType->name}}</th>
                            </tr>

                             </thead>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <h3>Preguntas</h3>
                                <hr>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 80%;">Preguntas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($guide->questions as $question)
                                <tr>
                                    <td>{{$question->number}}</td>
                                    <td>{{$question->content}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 80%;">Preguntas</th>
                            </tr>
                            </tfoot>
                        </table>



                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <a style="float: right" type="button" id="cancel" href="{{route('guide.index')}}" name="cancel"
                       class="btn btn-primary">Vuelva Atras</a>
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
