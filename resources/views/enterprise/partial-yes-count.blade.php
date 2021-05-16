<div id="event_count_div" class="card mt-5">
    <div class="card-header">
        <strong>Datos por Cantidad que respondieron Si</strong>
        <i style="float:right; cursor: pointer" class="fas fa-window-close"></i>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="dataTable_count" width="100%" cellspacing="0">
            <thead>
            <tr>

                <th style="width: 20%;">Nombre</th>
                <th style="width: 20%;">Apellidos</th>
                <th style="width: 20%;">Respuesta</th>
                <th style="width: 5%;">total</th>

            </tr>
            </thead>
            <tbody>
            @foreach($quizzedWithTotal as $key => $quizzedTotal)
                <tr>

                    <td>{{$quizzedTotal->name}}</td>
                    <td>{{$quizzedTotal->last_name}}</td>
                    <td>{{$quizzedTotal->content}}</td>
                    <td>{{$quizzedTotal->total}}</td>



                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>

                <th style="width: 20%;">Nombre</th>
                <th style="width: 20%;">Apellidos</th>
                <th style="width: 20%;">Respuesta</th>
                <th style="width: 5%;">total</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
