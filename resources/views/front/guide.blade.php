@extends('layouts.front')
    @section('header')
        <h1>Guias Norma 35</h1>

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
            <div class="form-group">
                <button type="button"  style="float: right" id="btn-surveyed-next" class="btn btn-success">Guardar</button>
            </div>
            </div>

            <div class="clearfix"></div>
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

                <div class="form-group">
                    <button type="submit"  style="float: right" id="btn-surveyed-send" class="btn btn-success">Enviar</button>
                </div>
            </div>

        </form>


        @endsection

