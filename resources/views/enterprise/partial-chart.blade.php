<div id="graf_event" class="card mt-5" data-enterprise="{{$enterprise->id}}">
    <div class="card-header">
        <strong>Gráfico</strong>
        <i style="float:right; cursor: pointer" class="fas fa-window-close"></i>
    </div>
    <div class="card-body">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Charts</b></div>
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
