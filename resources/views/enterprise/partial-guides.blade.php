<div id="guide_list_report" class="card mt-5">
    <div class="card-header">
        <strong>Guias Aplicadas</strong>
        <i style="float:right; cursor: pointer" class="fas fa-window-close"></i>
    </div>
    <div class="card-body">
        <div class="col-md-12">

            <br>
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-table"></i> Lista de guias aplicadas</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th style="width: 5%;">No </th>
                                <th style="width: 30%;">Empresa</th>
                                <th style="width: 30%;">Tipo de Guia</th>
                                <th style="width: 30%;">Enquestado</th>


                                <th style="width: 30%;">Realizada</th>
                                <th style="width: 5%;"></th>
                                <th style="width: 5%;"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($enterprise->appliedGuides()->get() as $key => $applied_guide)
                                <tr>
                                    <td>{{$counter = $counter+1}}</td>
                                    <td>{{$applied_guide->enterprise->name}}</td>
                                    <td>{{$applied_guide->guide->title}}</td>

                                    @if($applied_guide->guide->id == 1)
                                        <td>{{$applied_guide->quizzed->name}}</td>
                                    @else
                                        <td>no tiene aplicantes</td>
                                    @endif
                                    <td>{{date("d/m/Y", strtotime("$applied_guide->created_at"))}}</td>

                                    <td class="cell-center">
                                        <a href="{{route('applied.show', $applied_guide)}}" class="fa fa-eye"
                                           title="Ver detalles"></a></td>
                                    <td class="cell-center">
                                        <form method="POST"
                                              action="{{ route('applied.destroy', $applied_guide) }}"
                                              style="display: inline">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                            <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm('¿Estás seguro de querer eliminar esta esta guia?')"
                                            ><i class="fa fa-times"></i></button>
                                        </form></td>
                                    {{--                                        <td class="cell-center">--}}
                                    {{--                                            <a href="{{route('replies.show', $reply)}}" class="fa fa-eye"--}}
                                    {{--                                               title="Ver detalle"></a></td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="width: 5%;">No </th>
                                <th style="width: 30%;">Empresa</th>
                                <th style="width: 30%;">Tipo de Guia</th>
                                <th style="width: 30%;">Enquestado</th>


                                <th style="width: 30%;">Realizada</th>
                                <th style="width: 5%;"></th>
                                <th style="width: 5%;"></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted"></div>
            </div>
        </div>
    </div>
</div>
