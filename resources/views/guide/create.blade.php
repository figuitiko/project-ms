@extends('layouts.app')
@section('titulo')
    Nuevo Accesorio
@endsection

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Registrar una Guia</div>
        <div class="card-body">
            @if(Session::has('menssage'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    {{ Session::get('menssage') }}
                </div>
            @endif
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                  action="{{route('guide.store') }}">
                {{csrf_field()}}
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
                    <label class="control-label">Descripción </label>
                    <div class="form-label-group">
                        {{--                        <input type="text" id="inventario" name="inventario" class=" form-control"  autofocus value="{{ old('inventario') }}">--}}
                        <textarea class="form-control" name="description">{{old('description')}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tipos</label>
                    <div class="form-label-group">
                <select class="custom-select" name="guide_type_id" >
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach

                </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">PreguntaS </label>
                   <div id="questions" class="row">
                    <div class=" col-md-8">
                       <textarea class="form-control"  name="questions[]">{{old('description')}}</textarea>
                    </div>
                    <div class=" col-md-4">
                    <button type="button" id="add" name="add" class="btn btn-success">Agregar pregunta</button>
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
