@extends('layouts.front')
    @section('header')

        <div id="modalOverlay">
            <div class="modalPopup">
                <div class="headerBar">
                    <img src="https://placehold.it/200x25/edcb04/333333/?text=LOGO" alt="Logo">
                </div>
                <div class="modalContent">
                    <h1>Modal window title here</h1>
                    <p>Modal appears on page load, presents information and is dismissed after the "Close" button is clicked. Styled modal messaging, images and other information here.</p>
                    <button class="buttonStyle" id="button" data-token="{{ csrf_token() }}>Close</button>
                </div>
            </div>
        </div>
        <h1>Guias Norma 35</h1>
        <h2 class="text-center">Datos del encuestado</h2>
        <form id="surveyed-form">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre Encuestado</label>
                <input type="text" class="form-control" id="surveyedName" name="surveyedName" placeholder="Nombres">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Apellidos</label>
                <input type="text" class="form-control" id="surveyedLastName" name="surveyedLastName" placeholder="Apellidos">
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
            <div class="form-group">
                <button type="submit"  style="float: right" id="btn-surveyed-next" class="btn btn-success">Guardar</button>
            </div>
        </form>

            <div class="clearfix"></div>
            <div class="col-12 text-center">
                <h2>Questionario</h2>
            </div>
            <div class="col-12 ">
                <div class="row">


                    @foreach($guide->questions as $question)
                    <div class="col-md-4">
                        <fieldset id="group{{++$counter}}">
                        <label for="exampleFormControlTextarea1">{{$counter}}-{{$question->content}}</label>
                            <?php $i=1?>


                        @foreach($replies as $reply)

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="group{{$counter}}" id="group{{$counter}}" value="option{{++$i}}" >
                                <label class="form-check-label" for="exampleRadios1">
                                    {{$reply->content}}
                                </label>
                            </div>




                            @endforeach
                        </fieldset>
                    </div>

                        @if( $loop->iteration %3 == 0)
                         </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="style-four">

                                </div>
                            </div>


                            <div class="clearfix"></div>
                <div class="row">

                        @endif
                        @endforeach

            </div>
            </div>


        @endsection
        @section('content')

        @endsection

</html>
