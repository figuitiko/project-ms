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


                    @foreach($guide->guideType->categories as $category)
                        @if($category->id == 1 )
                            <h4 class="question">Para responder las preguntas siguientes considere las condiciones de su centro de trabajo, así como la cantidad y ritmo de
                                trabajo.</h4>
                            @endif
                        @if($category->id == 2 )
                                <h4 class="question">Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.</h4>
                            @endif
                        @if($category->id == 3 )
                                <h4 class="question">Las preguntas siguientes están relacionadas con el tiempo destinado a su trabajo y sus responsabilidades familiares.</h4>
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
                        @endforeach



{{--                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th style="width: 5%;">No </th>--}}
{{--                        <th style="width: 60%;">Preguntas</th>--}}
{{--                        @foreach($replies as $reply)--}}
{{--                        <th style="width: 5%;">{{$reply->content}}</th>--}}
{{--                            @endforeach--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($guide->questions as $key => $question)--}}
{{--                        <tr>--}}
{{--                            <td>{{$question->id}}</td>--}}
{{--                            <td>{{$question->content}}</td>--}}
{{--                            @foreach($replies as $reply)--}}
{{--                                <td class="text-center">--}}

{{--                                    <input class="form-check-input " type="radio"  name="question{{$question->id}}" value="{{$reply->id}},{{$question->id}}" >--}}
{{--                                </td>--}}
{{--                                @endforeach--}}


{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                    <tfoot>--}}
{{--                    <tr>--}}
{{--                        <th style="width: 5%;">No </th>--}}
{{--                        <th style="width: 60%;">Preguntas</th>--}}
{{--                        @foreach($replies as $reply)--}}
{{--                            <th style="width: 5%;">{{$reply->content}}</th>--}}
{{--                        @endforeach--}}
{{--                    </tr>--}}
{{--                    </tfoot>--}}
{{--                </table>--}}

                <div class="form-group" style="margin-top: 20px">
                    <button type="submit"  style="float: right" id="btn-surveyed-send" class="btn btn-success btn-lg">Enviar</button>
                </div>
            </div>
            </div>
        </form>
        @else
        <h1>La guia no esta activa</h1>
        @endif


        @endsection


@push('scripts')
<script src="{{ asset('js/front/guide.js') }}"></script>
@endpush




