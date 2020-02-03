@extends('layouts.front')
    @section('header')
        <h1>Guias Norma 35</h1>
        @if($guide->is_activated)

        <form id="surveyed-form-2" method="post" action="{{route('save.guide')}}" >
            {{csrf_field()}}
            <div id="user-data">
                <h2 class="text-center">Datos del encuestado</h2>
                <input type="hidden" name="guide_id" value="{{$guide->id}}">
                <input type="hidden" name="enterprise_id" value="{{$guide->active_enterprise_id}}">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre Encuestado</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombres">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Apellidos</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Ocupación</label>
                <input type="text" class="form-control" id="job" name="job" placeholder="Ocupación">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Edad</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Edad">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Estudios</label>
                <textarea class="form-control" id="studies" name="studies" rows="3"></textarea>
            </div>

            </div>

            <div class="clearfix"></div>
            <hr class="style-four">
            <div class="col-12 text-center">
                <h2>Questionario</h2>
            </div>
            <div id="last-class">
                <div class="row">


                    @foreach($guide->questions as $question)
                    <div class="col-md-12 border-survey">
                        <fieldset id="group{{++$counter}}">
                            <div class="row">
                            <div class="col-md-4  ">
                        <label for="exampleFormControlTextarea1">{{$counter}}-{{$question->content}}</label>
                            <?php $i=1?>
                            </div>

                        <div class="col-md-8 ">
                        @foreach($replies as $reply)

                                <div class="custom-control custom-radio custom-control-inline">

                                <label class="form-check-label" for="exampleRadios1">
                                    {{$reply->content}}
                                </label>

                                <input class="form-check-input " type="radio" name="question{{$question->id}}" value="{{$reply->id}},{{$question->id}}" >


                                </div>
                            @endforeach
                        </div>
                            </div>
                        </fieldset>
                    </div>


                        @if( $loop->iteration %3 == 0)
                         </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="style-four">

                                </div>
                            </div>


                            <div class="clearfix"></div>
                <div  class="row">

                        @endif
                        @endforeach

            </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="width: 5%;">No </th>
                        <th style="width: 30%;">pregunta</th>
                        @foreach($replies as $reply)
                        <th style="width: 5%;">{{$reply->content}}</th>
                            @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($guide->questions as $key => $question)
                        <tr>
                            <td>{{$question->id}}</td>
                            <td>{{$question->content}}</td>
                            @foreach($replies as $reply)
                                <td>

                                    <input class="form-check-input " type="radio" name="question{{$question->id}}" value="{{$reply->id}},{{$question->id}}" ></td>
                                @endforeach


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

                <div class="form-group" style="margin-top: 20px">
                    <button type="submit"  style="float: right" id="btn-surveyed-send" class="btn btn-success btn-lg">Enviar</button>
                </div>
            </div>

        </form>
        @else
        <h1>La guia no esta activa</h1>
        @endif


        @endsection

