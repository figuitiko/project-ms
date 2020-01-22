@extends('layouts.app')
@section('titulo')
    Editar Respuesta
@endsection

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Editar un producto</div>
        <div class="card-body">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    {{ Session::get('message') }}
                </div>
            @endif
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                  action="{{route('replies.update',$reply) }}">
                {{csrf_field()}} {{ method_field('PUT') }}
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
                    <label class="control-label">Contenido de la respuesta </label>
                    <div class="form-label-group">
                        <input type="text" id="content" name="content" value="{{$reply->content}}"
                                class=" form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group col-md-offset-3">
                        <a type="button" id="cancel" href="{{route('replies.index')}}" name="cancel"
                           class="btn btn-primary">Cancel</a>
                        <button type="submit" id="guardar" name="guardar" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
