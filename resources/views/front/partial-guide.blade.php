

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
                    <label for="exampleFormControlInput1">Tipo de Puesto</label>
                    <select  class="form-control" id="kind_job" name="kind_job" >
                        <option value="Operativo">Operativo</option>
                        <option value="Profesional Técnico">Profesional Técnico</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Jefatura">Jefatura</option>
                        <option value="Gerente">Gerente</option>
                        <option value="otro">otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tipo de contrato</label>
                    <select  class="form-control" id="kind_contract" name="kind_contract" >
                        <option value="Confianza">Confianza</option>
                        <option value="Sindicalizado">Sindicalizado</option>
                        <option value="Ninguno">Ninguno</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Departamento</label>
                    <input type="text" class="form-control" id="department" name="department" placeholder="Departamento">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Rango de Edad</label>
                    <select  class="form-control" id="ageRange" name="ageRange">

                        @foreach($ageRanges as $ageRange)
                        <option value="{{$ageRange->id}}">{{$ageRange->content}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">

                    <label for="exampleFormControlInput1">Nivel de Estudios</label>
                    <select  class="form-control" id="studiesLevel" name="studiesLevel">

                        @foreach($studiesLevels as $studyLevel)
                            <option value="{{$studyLevel->id}}">{{$studyLevel->content}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Estado Cívil</label>
                    <select  class="form-control" id="civil_state" name="civil_state" >
                        <option value="soltero">soltero</option>
                        <option value="casado">casado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tipo de Jornada</label>
                    <select  class="form-control" id="type_day" name="type_day">
                        <option value="Diurno 6:00 a 20:00 hrs.">Diurno 6:00 a 20:00 hrs.</option>
                        <option value="Nocturno 20:00 a 6:00 hrs.">Nocturno 20:00 a 6:00 hrs.</option>
                        <option value="Mixto">Mixto</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Rotación de turno</label>
                    <select  class="form-control" id="rotation_turn" name="rotation_turn">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tiempo en el puesto actual</label>
                    <select  class="form-control" id="current_position_time" name="current_position_time"   >
                        <option value="Menos 6 meses">Menos 6 meses</option>
                        <option value="6 meses a 1 año">6 meses a 1 año</option>
                        <option value="Entre 1 y 4 años">Entre 1 y 4 años</option>
                        <option value="Entre 5 a 9 años">Entre 5 a 9 años</option>
                        <option value="Entre 10 y 14 años">Entre 10 y 14 años</option>
                        <option value="Entre 15 y 19 años">Entre 15 y 19 años</option>
                        <option value="25 o más años">25 o más años</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tiempo laboral en la empresa: Experiencia</label>
                    <select  class="form-control" id="enterprise_time" name="enterprise_time">
                        <option value="Menos 6 meses">Menos 6 meses</option>
                        <option value="6 meses a 1 año">6 meses a 1 año</option>
                        <option value="Entre 1 y 4 años">Entre 1 y 4 años</option>
                        <option value="Entre 5 a 9 años">Entre 5 a 9 años</option>
                        <option value="Entre 10 y 14 años">Entre 10 y 14 años</option>
                        <option value="Entre 15 y 19 años">Entre 15 y 19 años</option>
                        <option value="25 o más años">25 o más años</option>
                    </select>
                </div>
                @foreach($guide->guideType->categories as $category)

                @if($category->id == 23 && $category->guide_type_id == 1)
                    <div id="header_{{$category->id}}" class="col-md-12">
                        <h4 class="question">¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:
                          </h4>
                    </div>
                        @endif
                        @if($category->id == 24 && $category->guide_type_id == 1)
                            <div id="header_{{$category->id}}" class="col-md-12" >
                                <h4  class="question">¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:
                                </h4>
                            </div>
                                @endif
                                @if($category->id == 25 && $category->guide_type_id == 1)
                                    <div id="header_{{$category->id}}" class="col-md-12">
                                        <h4 class="question">¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:
                                        </h4>
                                    </div>
                                        @endif
                             @if($category->id == 26 && $category->guide_type_id == 1)
                                <div id="header_{{$category->id}}" class="col-md-12">
                                    <h4 class="question">¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:
                                    </h4>
                                </div>
                                    @endif
                        @if($category->guide_type_id == 1 )
                            <table class="table table-bordered" id="dataTable_{{$category->id}}" width="100%" cellspacing="0" data-value="{{$category->id}}">
                                <thead>
                                <tr>
                                    <th style="width: 5%;">No </th>
                                    <th style="width: 60%;">Preguntas</th>
                                    <th style="width: 5%;">Si</th>
                                    <th style="width: 5%;">No</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($guide->questions->where('category_id',$category->id) as $key => $question)
                                    <tr>
                                        <td>{{$question->number}}</td>
                                        <td>{{$question->content}}</td>
                                        @foreach($replies as $reply)
                                            @if($reply->content == 'Si' ||$reply->content == 'No' )
                                            <td class="text-center">
                                                @if($reply->content == 'Si')
                                                <input class="form-check-input checking_yes " type="radio"  name="question{{$question->id}}" value="{{$reply->id}},{{$question->id}}" >
                                                    @endif
                                                    @if($reply->content == 'No')
                                                        <input class="form-check-input checking_no " type="radio"  name="question{{$question->id}}" value="{{$reply->id}},{{$question->id}}" >
                                                    @endif

                                            </td>
                                            @endif
                                        @endforeach


                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        @endif
                    @endforeach



                <div id="send_button" class="form-group col-md-12" style="margin-top: 20px">
                    <button type="submit"   id="btn-surveyed-send" class="btn btn-success btn-lg offset-11">Enviar</button>
                </div>


            </div>

            <div class="clearfix"></div>





        </form>






