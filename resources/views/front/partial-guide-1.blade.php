

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

            <div class="clearfix"></div>
        <div class="question_wrapper">
            <div id="question_header" class="col-12 text-center">
                <h2>Questionario</h2>
            </div>
            <div id="last-class">
                <div class="row">
                    <div class="col-md-12">


                    @foreach($guide->guideType->categories as $category)

                        @if($category->id == 1 && $category->guide_type_id == 1)
                            <div class="category_wrapper_first">
                            <h4 class="question">Para responder las preguntas siguientes considere las condiciones de su centro de trabajo, así como la cantidad y ritmo de
                                trabajo.</h4>
                            @endif
                        @if($category->id == 2  && $category->guide_type_id == 1)
                                <h4 class="question">Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.</h4>
                            @endif
                        @if($category->id == 3  && $category->guide_type_id == 1)
                                <h4 class="question">Las preguntas siguientes están relacionadas con el tiempo destinado a su trabajo y sus responsabilidades familiares.</h4>
                            @endif
                            @if($category->id == 4  && $category->guide_type_id == 1)
                                <div class="category_wrapper_second">
                                <h4 class="question">Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.</h4>
                            @endif
                            @if($category->id == 5 && $category->guide_type_id == 1 )
                                <h4 class="question">Las preguntas siguientes están relacionadas con la capacitación e información que recibe sobre su trabajo.</h4>
                            @endif
                            @if($category->id == 6  && $category->guide_type_id == 1)
                                <h4 class="question">Las preguntas siguientes se refieren a las relaciones con sus compañeros de trabajo y su jefe.</h4>
                            @endif
                            @if($category->id == 7  && $category->guide_type_id == 1)
                                        <div class="category_wrapper_third">
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
                            @if($category->id == 8  && $category->guide_type_id == 1)
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
                                    <td>{{$question->id}}</td>
                                    <td>{{$question->content}}</td>
                                    @foreach($replies as $reply)
                                        <td class="text-center">

                                            <input class="form-check-input " type="radio"  name="question{{$question->id}}" value="{{$reply->id}},{{$question->id}}" >
                                        </td>
                                    @endforeach


                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                                @if($category->id == 3  && $category->guide_type_id == 1)
                                    <div class="form-group">
                                        <button id="question_first_button" type="button" class="btn btn-success offset-11">Siquiente</button>
                                    </div>
                                    </div>
                                    @endif
                                @if($category->id == 6  && $category->guide_type_id == 1)
                                        <div class="form-group">
                                            <button id="question_second_button" type="button" class="btn btn-success offset-11">Siquiente</button>
                                        </div>
                                </div>
                                 </div>
                                @endif
                                @if($category->id == 8  && $category->guide_type_id == 1)
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






