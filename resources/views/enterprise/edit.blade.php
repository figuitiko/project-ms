@extends('layouts.app')
@section('titulo')
    Editar producto
@endsection

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Editar un Empresa</div>
        <div class="card-body">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    {{ Session::get('message') }}
                </div>
            @endif
            <form id="demo-form-enterprise" data-parsley-validate class="form-horizontal form-label-left" method="post"
                  action="{{route('enterprise.update',$enterprise) }}">
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
                    <label class="control-label">Nombre de la Empresa  </label>
                    <div class="form-label-group">
                        <input type="text" id="name" name="name" value="{{$enterprise->name}}"
                                class=" form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Razón Social </label>
                    <div class="form-label-group">
                        <input type="text" id="social_reason" name="social_reason" value="{{$enterprise->social_reason}}"
                               class=" form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Cantidad De Trabajadores </label>
                    <div class="form-label-group">
                        <input type="text" id="worker_amount" name="worker_amount" value="{{$enterprise->worker_amount}}"
                               class=" form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">RFC</label>
                    <div class="form-label-group">
                        <input type="text" id="rfc" name="rfc" value="{{$enterprise->rfc}}"
                               class=" form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Teléfono</label>
                    <div class="form-label-group">
                        <input type="text" id="phone" name="phone" value="{{$enterprise->phone}}"
                               class=" form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Direccción</label>
                    <div class="form-label-group">
                        <input type="text" id="address" name="address" value="{{$enterprise->address}}"
                               class=" form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Actividad que desempeña</label>
                    <div class="form-label-group">
                        <textarea class="form-control" name="activity">{{$enterprise->activity}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Guias</label>
                    <div class="form-label-group">


                            <select class="custom-select" name="guides[]" multiple >
                                @foreach($guides as $guide)
                                    <option value="{{$guide->id}}" >{{$guide->title}} </option>
                                @endforeach

                            </select>


                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group col-md-offset-3">
                        <a type="button" id="cancel" href="{{route('enterprise.index')}}" name="cancel"
                           class="btn btn-primary">Cancel</a>
                        <button type="submit" id="guardar" name="guardar" class="btn btn-success">Guardar</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
@push('scripts')

    <script src="{{ asset('js/admin/enterprise.js') }}"></script>

@endpush
