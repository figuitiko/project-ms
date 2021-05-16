
<div id="even_tr_div" class="card mt-5">
    <div class="card-header"><i class="fas fa-grav"></i><strong>Datos de encuestados que Respondieron que "Si"</strong>
        <i style="float:right; cursor: pointer" class="fas fa-window-close"></i>
    </div>
    <div class="card-body">





        <div class="clearfix"></div>
        <div  class="row">


            <table class="table table-bordered" id="dataTable_event_tr" width="100%" cellspacing="0">
                <thead>
                <tr>

                    <th style="width: 20%;">Nombre</th>
                    <th style="width: 20%;">Apellidos</th>
                    <th style="width: 20%;">Pregunta</th>
                    <th style="width: 5%;">Respuesta</th>

                </tr>
                </thead>
                <tbody>
                @foreach($quizzedsYes as $key => $quizzed)
                    <tr>

                        <td>{{$quizzed->name}}</td>
                        <td>{{$quizzed->last_name}}</td>
                        <td>{{$quizzed->content}}</td>
                        <td>{{$quizzed->contentReply}}</td>



                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>

                    <th style="width: 20%;">Nombre</th>
                    <th style="width: 20%;">Apellidos</th>
                    <th style="width: 20%;">Pregunta</th>
                    <th style="width: 5%;">Respuesta</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
