@extends('layouts.app')
@section('titulo')
    Nuevo Accesorio
@endsection

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Registrar una Empresa</div>
        <div class="card-body">
            @if(Session::has('menssage'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    {{ Session::get('menssage') }}
                </div>
            @endif
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                  action="{{route('enterprise.store') }}">
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
                    <label class="control-label">Nombre de la Empresa </label>
                    <div class="form-label-group">
                        <input type="text" id="name" name="name"  class=" form-control"
                               autofocus value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Razón Social </label>
                    <div class="form-label-group">

                        <textarea class="form-control" name="social_reason">{{old('social_reason')}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Cantidad De Trabajadores </label>
                    <div class="form-label-group">
                        <input type="text" id="worker_amount" name="worker_amount"  class=" form-control"
                               autofocus value="{{ old('worker_amount') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">RFC </label>
                    <div class="form-label-group">
                        <input type="text" id="rfc" name="rfc"  class=" form-control"
                               autofocus value="{{ old('rfc') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Teléfono </label>
                    <div class="form-label-group">
                        <input type="text" id="phone" name="phone"  class=" form-control"
                               autofocus value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Direccción </label>
                    <div class="form-label-group">
                        <input type="text" id="address" name="address"  class=" form-control"
                               autofocus value="{{ old('address') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Actividad que desempeña</label>
                    <div class="form-label-group">
                        <textarea class="form-control" name="activity">{{old('activity')}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Tipos</label>
                    <div class="form-label-group">
                        <select class="custom-select" name="guides[]" multiple >
                            @foreach($guides as $guide)
                                <option value="{{$guide->id}}">{{$guide->title}}</option>
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
