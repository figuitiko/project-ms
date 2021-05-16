<div id="basic_emp" class="card mt-5">
    <div class="card-header">
        Reportes
    </div>
    <div class="card-body">
        <div class="row mt-3 mb-3">
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-header">
                        <p>Lista de guías</p>
                    </div>
                    <div class="card-body">
                        <button id="guide_list_btn"  class="btn btn-primary">Abrir</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-header">
                        <p> Eventos Traumáticos</p>
                    </div>
                    <div class="card-body">
                        <button id="even_tr"  class="btn btn-primary">Abrir</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-header">
                        <p>Cantidad E.T</p>
                    </div>
                    <div class="card-body">
                        <button id="even_count" class="btn btn-primary">Abrir</button>
                    </div>
                </div>


            </div>
            <div class="col-md-4 text-center mb-5 mt-5">
                <div class="card">
                    <div class="card-header">
                        <p>Gráfico</p>
                    </div>
                    <div class="card-body">
                        <button id="graf_ev_btn" class="btn btn-primary">Abrir</button>
                    </div>
                </div>



            </div>


            <div class="col-md-4 text-center mb-5 mt-5">
                <div class="card">
                    <div class="card-header">
                        <p>Resultado total</p>
                    </div>
                    <div class="card-body">
                        <button id="total_result_btn" class="btn btn-primary">Abrir</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-center mb-5 mt-5">
                <div class="card">
                    <div class="card-header">
                        <p>Resultado por Categorias</p>
                    </div>
                    <div class="card-body">
                        <button id="total_cat_btn" class="btn btn-primary">Abrir</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center ">
                <div class="card">
                    <div class="card-header">
                        <p>Resultado por Dominios</p>
                    </div>
                    <div class="card-body">
                        <button id="total_dom_btn" class="btn btn-primary">Abrir</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-center ">
                <div class="card">
                    <div class="card-header">
                        <p>Reporte Excel</p>
                    </div>
                    <div class="card-body">
                    <form id="form_excel">
                        <div class="form-group">

                            <label for="exampleInputPassword1">Preguntas</label>
                            <input type="text" class="form-control" id="questions_values" placeholder="preguntas">
                            <input id="csrf_token_value" type="hidden" value="{{csrf_token()}}" >
                            <input id="enterprise_value" type="hidden" value="{{$enterprise->id}}" >
                            <input id="guide_value" type="hidden" value="{{$guideBelong}}" >
                        </div>
                        <button type="submit" class="btn btn-primary">Solicitar excel</button>
                    </form>
                    </div>

                </div>
            </div>
            <div class="col-md-4 text-center ">
                <div class="card">
                    <div class="card-header">
                        <p>Guías Traumas Pdf</p>
                    </div>
                    <div class="card-body">
                        <a href="/admin/pdf/{{$enterprise->id}}" class="btn btn-primary">Descargar PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
