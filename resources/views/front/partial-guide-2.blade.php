

<form id="surveyed-form-2" method="post" action="{{route('save.guide')}}" >
    {{csrf_field()}}
    <input type="hidden" name="guide_id" value="{{$guide->id}}">
    <input type="hidden" name="enterprise_id" value="{{$guide->active_enterprise_id}}">



    <div class="question_wrapper">
        <div id="question_header" class="col-12 text-center">
            <h2>Cuestionario</h2>
        </div>
        <div id="last-class">
            <div class="row">
                <div class="col-md-12">


                    @foreach($guide->guideType->categories as $category)

                        @if($category->id == 9 && $category->guide_type_id == 3)
                            <div class="category_wrapper_first">
                                <h4 class="question">Para responder las preguntas siguientes considere las condiciones ambientales de su centro de trabajo.</h4>
                                @endif
                                @if($category->id == 10  && $category->guide_type_id == 3)
                                    <h4 class="question">Para responder a las preguntas siguientes piense en la cantidad y ritmo de trabajo que tiene.</h4>
                                @endif
                                @if($category->id == 11  && $category->guide_type_id == 3)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con el esfuerzo mental que le exige su trabajo.</h4>
                                @endif
                                @if($category->id == 12  && $category->guide_type_id == 3)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.</h4>
                                @endif
                                @if($category->id == 13  && $category->guide_type_id == 3)
                                    <div class="category_wrapper_second">
                                    <h4 class="question">Las preguntas siguientes están relacionadas con su jornada de trabajo.</h4>
                                @endif
                                @if($category->id == 14  && $category->guide_type_id == 3)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.</h4>
                                @endif
                                @if($category->id == 15  && $category->guide_type_id == 3)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con cualquier tipo de cambio que ocurra en su trabajo (considere los últimos
                                        cambios realizados).</h4>
                                @endif
                                @if($category->id == 16  && $category->guide_type_id == 3)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con la capacitación e información que se le proporciona sobre su trabajo.</h4>
                                @endif
                                @if($category->id == 17  && $category->guide_type_id == 3)

                                    <h4 class="question">Las preguntas siguientes están relacionadas con el o los jefes con quien tiene contacto.</h4>
                                @endif
                                @if($category->id == 18  && $category->guide_type_id == 3)
                                            <div class="category_wrapper_third">
                                    <h4 class="question">Las preguntas siguientes se refieren a las relaciones con sus compañeros.</h4>
                                @endif
                                @if($category->id == 19  && $category->guide_type_id == 3)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con la información que recibe sobre su rendimiento en el trabajo, el
                                        reconocimiento, el sentido de pertenencia y la estabilidad que le ofrece su trabajo.</h4>
                                @endif
                                @if($category->id == 20  && $category->guide_type_id == 3)
                                    <h4 class="question">Las preguntas siguientes están relacionadas con actos de violencia laboral (malos tratos, acoso, hostigamiento, acoso
                                        psicológico).</h4>
                                @endif

                                @if($category->id == 21  && $category->guide_type_id == 3)
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
                                @if($category->id == 22  && $category->guide_type_id == 3)
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
                                                            @if($reply->content != 'Si' && $reply->content != 'No' )
                                                            <th style="width: 5%;">{{$reply->content}}</th>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($guide->questions->where('category_id',$category->id) as $key => $question)
                                                        <tr>
                                                            <td>{{$question->number}}</td>
                                                            <td>{{$question->content}}</td>
                                                            @foreach($replies as $reply)
                                                                @if($reply->content != 'Si' && $reply->content != 'No' )
                                                                <td class="text-center">

                                                                    <input class="form-check-input " type="radio"  name="question{{$question->id}}" value="{{$reply->id}},{{$question->id}},{{$question->number}}" >
                                                                </td>
                                                                @endif
                                                            @endforeach


                                                        </tr>
                                                    @endforeach
                                                    </tbody>

                                                </table>
                                                @if($category->id == 12  && $category->guide_type_id == 3)
                                                    <div class="form-group">
                                                        <button id="question_first_button" type="button" class="btn btn-success offset-11">Siquiente</button>
                                                    </div>
                                            </div>
                                        @endif
                                        @if($category->id == 17  && $category->guide_type_id == 3)
                                            <div class="form-group">
                                                <button id="question_second_button" type="button" class="btn btn-success offset-11">Siquiente</button>
                                            </div>
                                    </div>

                        @endif
                                @if($category->id == 20  && $category->guide_type_id == 3)
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






