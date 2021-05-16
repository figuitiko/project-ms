@extends('layouts.app')
@section('titulo')
    Listar productos
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">

                <br>
                <div class="card">
                    <div class="card-header"><i class="fas fa-eye"></i> Datos Encuesta Realizada</div>
                    <div class="card-body">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="width: 20%;">Nombre de la Empresa </th>
                                <th style="width: 24%;">{{$appliedGuide->enterprise->name}}</th>
                            </tr>
                            @if($appliedGuide->guide->id == 1)
                            <tr>
                                <th style="width: 20%;">Nombre del Encuestado</th>
                                <th style="width: 24%;">{{$appliedGuide->quizzed->name}}</th>
                            </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                            <tr>
                                <th style="width: 20%;">Apellidos Encuestado</th>
                                <th style="width: 24%;">{{$appliedGuide->quizzed->last_name}}</th>
                            </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                                <tr>
                                    <th style="width: 20%;">Rango de Edad</th>
                                    <th style="width: 24%;">{{$appliedGuide->quizzed->ageRange->content}}</th>
                                </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                                <tr>
                                    <th style="width: 20%;">Rango de Estudio</th>
                                    <th style="width: 24%;">{{$appliedGuide->quizzed->studiesLevel->content}}</th>
                                </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                            <tr>
                                <th style="width: 20%;">Ocupación</th>
                                <th style="width: 24%;">{{$appliedGuide->quizzed->job}}</th>
                            </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                                <tr>
                                    <th style="width: 20%;">Departamento</th>
                                    <th style="width: 24%;">{{$appliedGuide->quizzed->department}}</th>
                                </tr>
                            @endif

                            @if($appliedGuide->guide->id == 1)
                                <tr>
                                    <th style="width: 20%;">Tipo de Puesto</th>
                                    <th style="width: 24%;">{{$appliedGuide->quizzed->position_kind}}</th>
                                </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                                <tr>
                                    <th style="width: 20%;">Estado Civil</th>
                                    <th style="width: 24%;">{{$appliedGuide->quizzed->civil_state}}</th>
                                </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                                <tr>
                                    <th style="width: 20%;">Tipo de Contrato</th>
                                    <th style="width: 24%;">{{$appliedGuide->quizzed->kind_contract}}</th>
                                </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                                <tr>
                                    <th style="width: 20%;">Tipo de Jornada</th>
                                    <th style="width: 24%;">{{$appliedGuide->quizzed->type_day}}</th>
                                </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                                <tr>
                                    <th style="width: 20%;">Rotación de Turno</th>
                                    <th style="width: 24%;">{{$appliedGuide->quizzed->rotation_turn}}</th>
                                </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                                <tr>
                                    <th style="width: 20%;">Tiempo en el puesto actual: Experiencia</th>
                                    <th style="width: 24%;">{{$appliedGuide->quizzed->current_position_time}}</th>
                                </tr>
                            @endif
                            @if($appliedGuide->guide->id == 1)
                                <tr>
                                    <th style="width: 20%;">Tiempo laboral en la empresa: Experiencia</th>
                                    <th style="width: 24%;">{{$appliedGuide->quizzed->enterprise_time}}</th>
                                </tr>
                            @endif
                            <tr>
                                <th style="width: 20%;">Numero de Guia</th>
                                <th style="width: 24%;">{{$appliedGuide->guide->guideType->name}}</th>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Fecha de Realizacion</th>
                                <th style="width: 24%;">{{date("d/m/Y", strtotime("$appliedGuide->created_at"))}}</th>
                            </tr>




                             </thead>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Preguntas y Respuestas</h3>
                                <hr>
                            </div>
                        </div>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th style="width: 5%;">No </th>

                                <th style="width: 20%;">Pregunta</th>
                                <th style="width: 20%;">Respuesta Dada</th>
                                @if($appliedGuide->guide_id != 1)
                                <th style="width: 5%;">Valor</th>
                                    @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appliedGuide->givenReplies as $reply )
                                <tr>
                                    @if($reply->question)
                                    <td>{{$reply->question->number}}</td>
                                    <td>{{$reply->question->content}}</td>
                                        <td>{{$reply->reply->content}}</td>
                                        @if($appliedGuide->guide_id != 1)
                                        <td>{{$reply->value}}</td>
                                        @endif
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="width: 5%;">No </th>

                                <th style="width: 20%;">Pregunta</th>
                                <th style="width: 20%;">Respuesta</th>
                                @if($appliedGuide->guide_id != 1)
                                    <th style="width: 5%;">Valor</th>
                                @endif
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                    <a style="float: right" type="button" id="cancel" href="{{route('applied.index')}}" name="cancel"
                       class="btn btn-primary">Vuelva Atras</a>
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
