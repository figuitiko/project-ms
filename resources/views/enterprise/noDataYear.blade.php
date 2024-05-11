@extends('layouts.app')
@section('titulo')
   Listar Empresas
@endsection
@section('content')
 <h3> No hay datos para el año seleccionado</h3>
@endsection

@push('scripts')

    <script src="{{ asset('js/admin/noData.js') }}"></script>
    

@endpush