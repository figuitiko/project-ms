@extends('layouts.front')
    @section('header')
        <h1>Guias Norma 35</h1>
        <div class="row">
            <div class="col-md-6"><a href="{{route('guide',1)}}" class="btn btn-primary">Guia Numero Uno</a></div>
            <div class="col-md-6"><a  href="{{route('guide',2)}}" class="btn btn-success">Guia Numero Dos</a></div>
        </div>

        @endsection

</html>
