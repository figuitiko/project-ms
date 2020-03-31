

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
            <button id="user_button" type="button" class="btn btn-success offset-11">Siquiente</button>
        </div>

    </div>
    <div class="question_wrapper">
        <div id="question_header" class="col-12 text-center">
            <h2>Questionario</h2>
        </div>
        <div id="last-class">
            <div class="row">
                <div class="col-md-12">


                    @foreach($guide->guideType->categories as $category)

                        @if($category->id == 9 && $category->guide_type_id == 2)
                            <div class="category_wrapper_first">
                                <h4 class="question">Para responder las preguntas siguientes considere las condiciones ambientales de su centro de trabajo.</h4>
                                @endif
                                @if($category->id == 10  && $category->guide_type_id == 2)
                                    <h4 class="question">Para responder a las preguntas siguientes piense en la cantidad y ritmo de trabajo que tiene.</h4>
                                @endif
                                @if($category->id == 11  && $category->guide_type_id == 2)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con el esfuerzo mental que le exige su trabajo.</h4>
                                @endif
                                @if($category->id == 12  && $category->guide_type_id == 2)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.</h4>
                                @endif
                                @if($category->id == 13  && $category->guide_type_id == 2)
                                    <div class="category_wrapper_second">
                                    <h4 class="question">Las preguntas siguientes están relacionadas con su jornada de trabajo.</h4>
                                @endif
                                @if($category->id == 14  && $category->guide_type_id == 2)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.</h4>
                                @endif
                                @if($category->id == 15  && $category->guide_type_id == 2)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con cualquier tipo de cambio que ocurra en su trabajo (considere los últimos
                                        cambios realizados).</h4>
                                @endif
                                @if($category->id == 16  && $category->guide_type_id == 2)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con la capacitación e información que se le proporciona sobre su trabajo.</h4>
                                @endif
                                @if($category->id == 17  && $category->guide_type_id == 2)

                                    <h4 class="question">Las preguntas siguientes están relacionadas con el o los jefes con quien tiene contacto.</h4>
                                @endif
                                @if($category->id == 18  && $category->guide_type_id == 2)
                                            <div class="category_wrapper_third">
                                    <h4 class="question">Las preguntas siguientes se refieren a las relaciones con sus compañeros.</h4>
                                @endif
                                @if($category->id == 19  && $category->guide_type_id == 2)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con la información que recibe sobre su rendimiento en el trabajo, el
                                        reconocimiento, el sentido de pertenencia y la estabilidad que le ofrece su trabajo.</h4>
                                @endif
                                @if($category->id == 20  && $category->guide_type_id == 2)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con actos de violencia laboral (malos tratos, acoso, hostigamiento, acoso
                                        psicológico).</h4>
                                @endif

                                @if($category->id == 21  && $category->guide_type_id == 2)
                                                    <div class="category_wrapper_four">

                                        <h4 class="question">Las preguntas siguientes están relacionadas con la atención a clientes y usuarios.</h4>
                                        <span>En mi trabajo debo brindar servicio a clientes o usuarios:</span>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="inlineRadio1">Si</label>
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        </div>
                                        <span id="text_yes_0" style="color:cornflowerblue">Si su respuesta fue "SÍ", responda las preguntas siguientes. Si su respuesta fue "NO" pase a las preguntas de la sección Siguiente</span>
                                @endif
                                @if($category->id == 22  && $category->guide_type_id == 2)
                                    <h4 class="question">Soy jefe de otros trabajadores:</h4>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">Si</label>
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option1">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option2">
                                    </div>
                                    <span id="text_yes_1" style="color:cornflowerblue">Si su respuesta fue "SÍ", responda las preguntas siguientes. Si su respuesta fue "NO", ha concluido el cuestionario.</span>
                                @endif







                                                <table class="table table-bordered" id="dataTable_{{$category->id}}" width="100%" cellspacing="0">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 5%;">No </th>
                                                        <th style="width: 60%;">Preguntas</th>
                                                        @foreach($replies as $reply)
                                                            <th style="width: 5%;">{{$reply->content}}</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($guide->questions->where('category_id',$category->id) as $key => $question)
                                                        <tr>
                                                            <td>{{$question->number}}</td>
                                                            <td>{{$question->content}}</td>
                                                            @foreach($replies as $reply)
                                                                <td class="text-center">

                                                                    <input class="form-check-input " type="radio"  name="question{{$question->id}}" value="{{$reply->id}},{{$question->number}}" >
                                                                </td>
                                                            @endforeach


                                                        </tr>
                                                    @endforeach
                                                    </tbody>

                                                </table>
                                                @if($category->id == 12  && $category->guide_type_id == 2)
                                                    <div class="form-group">
                                                        <button id="question_first_button" type="button" class="btn btn-success offset-11">Siquiente</button>
                                                    </div>
                                            </div>
                                        @endif
                                        @if($category->id == 17  && $category->guide_type_id == 2)
                                            <div class="form-group">
                                                <button id="question_second_button" type="button" class="btn btn-success offset-11">Siquiente</button>
                                            </div>
                                    </div>

                        @endif
                                @if($category->id == 20  && $category->guide_type_id == 2)
                                    <div class="form-group">
                                        <button id="question_third_button" type="button" class="btn btn-success offset-11">Siquiente</button>
                                    </div>
                            </div>

                        @endif
                        @if($category->id == 22  && $category->guide_type_id == 1)
                </div>
                @endif
                @endforeach





                <div id="send_button" class="form-group col-md-12" style="margin-top: 20px">
                    <button type="submit"   id="btn-surveyed-send" class="btn btn-success btn-lg offset-11">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</form>





