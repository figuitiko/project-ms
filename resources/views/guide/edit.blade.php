@extends('layouts.app')
@section('titulo')
    Editar producto
@endsection

@section('content')
    <div class="card card-register mx-auto mt-5">
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
                                    {{ old('guide_type_id', $guide->guide_type_id) == $type->id ? 'selected' : '' }}
                                >{{ $type->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                   <div class="questions">
                    @foreach($questions as $question)

                        <div class="row">
                            <label class="control-label">Pregunta Número-{{$counter=$counter+1}} </label>
                            <div class="col-md-10">
                                <input type="text" id="question-name" name="questions[]" value="{{old('content',$question->content)}}"
                                       class=" form-control" autofocus>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-xs btn-danger " data-id="{{ $question->id }}" data-token="{{ csrf_token() }}"  ><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    @endforeach
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
                        <button type="submit" id="guardar" name="guardar" class="btn btn-success">Guardar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@push('scripts')

    <script src="{{ asset('js/admin/guide.js') }}"></script>

@endpush
