@extends('layouts.app')
@section('titulo')
    Editar producto
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
              {{--  <div class="links">
                    <a href="{{route('guide.create')}}" class="btn btn-primary">Nueva Guia</a>
                </div>--}}
                <br>
    <div class="card ">
        <div class="card-header">Editar una Guia</div>
        <div class="card-body">

            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    {{ Session::get('message') }}
                </div>
            @endif
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                  action="{{route('guide.update',$guide->id) }}">
                {{csrf_field()}}  {{ method_field('PUT') }}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label class="control-label">Título de la Guía </label>
                    <div class="form-label-group">
                        <input type="text" id="title" name="title" value="{{old('title',$guide->title)}}"
                               class=" form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Descripción de la Guía </label>
                    <div class="form-label-group">
                        <input type="text" id="description"  name="description" value="{{old('description',$guide->description)}}"
                               class=" form-control" autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tipos</label>
                    <div class="form-label-group">
                        <select class="custom-select" name="guide_type_id" >
                            @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ old('guide_type_id', $guide->guide_type_id) == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Preguntas</h3>
                        <hr>
                    </div>
                </div>
                <hr>

                   <div class="questions">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                           <tr>
                               <th style="width: 5%;">No</th>
                               <th id="header-question" style="width: 80%;">Preguntas <span class="alert-danger"></span></th>
                               <th style="width: 5%;">Acciones</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($guide->questions as $question)
                               <tr>
                                   <td> <label class="control-label">{{$question->id}} </label></td>
                                   <td>
                                           <input id="input-{{$question->id}}" type="text"  name="questions[]" value="{{old('content',$question->content)}}"
                                                  class="question-content form-control" autofocus onkeyup="disableIfEmpty(this.id)">
                                       <span class="alert-success"></span>
                                      </td>
                                   <td id="action-{{$question->id}}" class="question">
                                       <button id="update-{{$question->id}}" class="btn btn-xs btn-success " onclick="updateQuestion(event,'{{$question->id}}','{{csrf_token()}}',this.id)" disabled="disabled" ><i class="fas fa-redo-alt"></i></button>
                                       <button  id ="delete-{{$question->id}}"  class="btn btn-xs btn-danger " onclick=" if(confirm('Esta seguro que desea borrar la pregunta'))  deleteQuestion(event, '{{$question->id}}', '{{csrf_token()}}',this.id); return false"  ><i class="fa fa-times"></i></button>


                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                           <tfoot>
                           <tr>
                               <th style="width: 5%;">No</th>
                               <th style="width: 80%;">Preguntas</th>
                               <th style="width: 5%;">Borrar</th>
                           </tr>
                           </tfoot>
                       </table>
{{--                    @foreach($questions as $question)--}}

{{--                        <div class="row">--}}
{{--                            <label class="control-label">Pregunta Número-{{$counter=$counter+1}} </label>--}}
{{--                            <div class="col-md-10">--}}
{{--                                <input type="text" id="question-name" name="questions[]" value="{{old('content',$question->content)}}"--}}
{{--                                       class=" form-control" autofocus>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-2">--}}
{{--                                <button class="btn btn-xs btn-danger " data-id="{{ $question->id }}" data-token="{{ csrf_token() }}"  ><i class="fa fa-times"></i></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
                   </div>
                <div class="form-group">
                    <label class="control-label">Agregar más preguntas</label>
                    <div id="questions" class="row">

                        <div class=" col-md-4">
                            <button type="button" id="add" name="add" class="btn btn-success">Agregar pregunta</button>
                        </div>
                        <div class="col-md-4">
                            <button   type="button" id="remove" name="remove" class="btn btn-danger button-visible">Borrar pregunta</button>
                        </div>


                    </div>
                </div>


                <div class="form-group">
                    <div class="form-label-group col-md-offset-3">
                        <a type="button" id="cancel" href="{{route('guide.index')}}" name="cancel"
                           class="btn btn-primary">Cancel</a>
                        <button type="submit" id="guardar" name="guardar"  data-token="{{ csrf_token() }}" class="btn btn-success">Guardar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script src="{{ asset('js/admin/guide.js') }}"></script>

@endpush
