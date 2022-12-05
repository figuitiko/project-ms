<div id="total_report_categories" class="card">
    <div class="card-header">
        <strong>Resultados por categorias</strong>
        <i style="float:right; cursor: pointer" class="fas fa-window-close"></i>
    </div>
    <div class="card-body">
        <div  class="row mt-5">
            @if( $enterprise->worker_amount <= 50 && count($guideReportValues) > 0)
                <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="width: 20%;">Categoria</th>
                        <th style="width: 24%;">valor</th>
                    </tr>
                    @if($guideReportValues['workEnvironmentAvgCat'] >= 9)
                        <tr>
                            <td style="width: 24%;">
                                <h3>Ambiente de trabajo</h3>
                            </td>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['workEnvironmentAvgCat'] >= 7 && $guideReportValues['workEnvironmentAvgCat'] < 9 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Ambiente de trabajo</h3>
                            </td>
                            <td  style="width: 20%;background-color: orange"><h3> Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['workEnvironmentAvgCat'] >= 5 && $guideReportValues['workEnvironmentAvgCat'] < 7 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Ambiente de trabajo</h3>
                            </td>
                            <td style="width: 20%; background-color: yellow"><h3> Medio</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['workEnvironmentAvgCat'] >= 3 && $guideReportValues['workEnvironmentAvgCat'] < 5 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Ambiente de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: green"><h3> Bajo</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['workEnvironmentAvgCat'] < 3  )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Ambiente de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: dodgerblue"><h3> Nulo o despreciable</h3>
                            </td>

                        </tr>
                    @endif

                    {{------------------      --------------factores propios -------------------}}

                    @if($guideReportValues['ownFactorsActivityCatAvg'] >= 40)
                        <tr>
                            <td style="width: 24%;">
                                <h3>Factores propios de la actividad</h3>
                            </td>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['ownFactorsActivityCatAvg'] >= 30 && $guideReportValues['ownFactorsActivityCatAvg'] < 40 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Factores propios de la actividad</h3>
                            </td>
                            <td  style="width: 20%; background-color: orange"><h3> Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['ownFactorsActivityCatAvg'] >= 20 && $guideReportValues['ownFactorsActivityCatAvg'] < 30 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Factores propios de la actividad</h3>
                            </td>
                            <td  style="width: 20%; background-color: yellow"><h3> Medio</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['ownFactorsActivityCatAvg'] >= 10 && $guideReportValues['ownFactorsActivityCatAvg'] < 20 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Factores propios de la actividad</h3>
                            </td>
                            <td  style="width: 20%; background-color: green"><h3> Bajo</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['ownFactorsActivityCatAvg'] < 10  )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Factores propios de la actividad</h3>
                            </td>
                            <td  style="width: 20%; background-color: dodgerblue"><h3> Nulo o despreciable</h3>
                            </td>

                        </tr>
                    @endif
                    {{--------------------------------Organización del tiempo de trabajo -------------------}}
                    @if($guideReportValues['organizationWorkTimeCatAvg'] >= 12)
                        <tr>
                            <td style="width: 24%;">
                                <h3>Organización del tiempo de trabajo</h3>
                            </td>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationWorkTimeCatAvg'] >= 9 && $guideReportValues['organizationWorkTimeCatAvg'] < 12 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Organización del tiempo de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: orange"><h3> Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationWorkTimeCatAvg'] >= 6 && $guideReportValues['organizationWorkTimeCatAvg'] < 9 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Organización del tiempo de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: yellow"><h3> Medio</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationWorkTimeCatAvg'] >= 4 && $guideReportValues['organizationWorkTimeCatAvg'] < 6 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Organización del tiempo de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: green"><h3> Bajo</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationWorkTimeCatAvg'] < 4  )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Organización del tiempo de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: dodgerblue"><h3> Nulo o despreciable</h3>
                            </td>

                        </tr>
                    @endif
                    {{--------------------------------Liderazgo y relaciones en el trabajo -------------------}}

                    @if($guideReportValues['leadershipWorkRelationsCatAvg'] >= 38)
                        <tr>
                            <td style="width: 24%;">
                                <h3>Liderazgo y relaciones en el trabajo</h3>
                            </td>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['leadershipWorkRelationsCatAvg'] >= 28 && $guideReportValues['leadershipWorkRelationsCatAvg'] < 38 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Liderazgo y relaciones en el trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: orange"><h3> Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['leadershipWorkRelationsCatAvg'] >= 18 && $guideReportValues['leadershipWorkRelationsCatAvg'] < 28 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Liderazgo y relaciones en el trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: yellow"><h3> Medio</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['leadershipWorkRelationsCatAvg'] >= 10 && $guideReportValues['leadershipWorkRelationsCatAvg'] < 18 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Liderazgo y relaciones en el trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: green"><h3> Bajo</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['leadershipWorkRelationsCatAvg'] < 10  )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Liderazgo y relaciones en el trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: dodgerblue"><h3> Nulo o despreciable</h3>
                            </td>

                        </tr>
                    @endif


                    </thead>
                </table>
            @endif
            {{------------------      --------------category guide 3 -------------------}}

            @if( $enterprise->worker_amount > 50 && count($guideReportValues) >0 )
                <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="width: 20%;">Categoria</th>
                        <th style="width: 24%;">valor</th>
                    </tr>
                    @if($guideReportValues['workEnvironmentAvgCat'] >= 14)
                        <tr>
                            <td style="width: 24%;">
                                <h3>Ambiente de trabajo</h3>
                            </td>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['workEnvironmentAvgCat'] >= 11 && $guideReportValues['workEnvironmentAvgCat'] < 14 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Ambiente de trabajo</h3>
                            </td>
                            <td  style="width: 20%;background-color: orange"><h3> Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['workEnvironmentAvgCat'] >= 9 && $guideReportValues['workEnvironmentAvgCat'] < 11 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Ambiente de trabajo</h3>
                            </td>
                            <td style="width: 20%; background-color: yellow"><h3> Medio</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['workEnvironmentAvgCat'] >= 5 && $guideReportValues['workEnvironmentAvgCat'] < 9 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Ambiente de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: green"><h3> Bajo</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['workEnvironmentAvgCat'] < 5  )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Ambiente de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: dodgerblue"><h3> Nulo o despreciable</h3>
                            </td>

                        </tr>
                    @endif

                    {{------------------      --------------factores propios -------------------}}

                    @if($guideReportValues['ownFactorsActivityCatAvg'] >= 60)
                        <tr>
                            <td style="width: 24%;">
                                <h3>Factores propios de la actividad</h3>
                            </td>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['ownFactorsActivityCatAvg'] >= 45 && $guideReportValues['ownFactorsActivityCatAvg'] < 60 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Factores propios de la actividad</h3>
                            </td>
                            <td  style="width: 20%; background-color: orange"><h3> Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['ownFactorsActivityCatAvg'] >= 30 && $guideReportValues['ownFactorsActivityCatAvg'] < 45 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Factores propios de la actividad</h3>
                            </td>
                            <td  style="width: 20%; background-color: yellow"><h3> Medio</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['ownFactorsActivityCatAvg'] >= 15 && $guideReportValues['ownFactorsActivityCatAvg'] < 30 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Factores propios de la actividad</h3>
                            </td>
                            <td  style="width: 20%; background-color: green"><h3> Bajo</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['ownFactorsActivityCatAvg'] < 15  )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Factores propios de la actividad</h3>
                            </td>
                            <td  style="width: 20%; background-color: dodgerblue"><h3> Nulo o despreciable</h3>
                            </td>

                        </tr>
                    @endif
                    {{--------------------------------Organización del tiempo de trabajo -------------------}}
                    @if($guideReportValues['organizationWorkTimeCatAvg'] >= 13)
                        <tr>
                            <td style="width: 24%;">
                                <h3>Organización del tiempo de trabajo</h3>
                            </td>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationWorkTimeCatAvg'] >= 10 && $guideReportValues['organizationWorkTimeCatAvg'] < 13 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Organización del tiempo de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: orange"><h3> Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationWorkTimeCatAvg'] >= 7 && $guideReportValues['organizationWorkTimeCatAvg'] < 10 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Organización del tiempo de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: yellow"><h3> Medio</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationWorkTimeCatAvg'] >= 5 && $guideReportValues['organizationWorkTimeCatAvg'] < 7 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Organización del tiempo de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: green"><h3> Bajo</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationWorkTimeCatAvg'] < 5  )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Organización del tiempo de trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: dodgerblue"><h3> Nulo o despreciable</h3>
                            </td>

                        </tr>
                    @endif
                    {{--------------------------------Liderazgo y relaciones en el trabajo -------------------}}

                    @if($guideReportValues['leadershipWorkRelationsCatAvg'] >= 58)
                        <tr>
                            <td style="width: 24%;">
                                <h3>Liderazgo y relaciones en el trabajo</h3>
                            </td>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['leadershipWorkRelationsCatAvg'] >= 42 && $guideReportValues['leadershipWorkRelationsCatAvg'] <= 58 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Liderazgo y relaciones en el trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: orange"><h3> Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['leadershipWorkRelationsCatAvg'] >= 28 && $guideReportValues['leadershipWorkRelationsCatAvg'] < 42 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Liderazgo y relaciones en el trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: yellow"><h3> Medio</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['leadershipWorkRelationsCatAvg'] >= 14 && $guideReportValues['leadershipWorkRelationsCatAvg'] < 28 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Liderazgo y relaciones en el trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: green"><h3> Bajo</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['leadershipWorkRelationsCatAvg'] < 14  )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Liderazgo y relaciones en el trabajo</h3>
                            </td>
                            <td  style="width: 20%; background-color: dodgerblue"><h3> Nulo o despreciable</h3>
                            </td>

                        </tr>
                    @endif
                    {{-------------------------------- Entorno organizacional -------------------}}
                    @if($guideReportValues['organizationalEnvironmentCatAvg'] >= 23)
                        <tr>
                            <td style="width: 24%;">
                                <h3>Entorno organizacional</h3>
                            </td>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationalEnvironmentCatAvg'] >= 18 && $guideReportValues['organizationalEnvironmentCatAvg'] < 23 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Entorno organizacional</h3>
                            </td>
                            <td  style="width: 20%; background-color: orange"><h3> Alto</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationalEnvironmentCatAvg'] >= 14 && $guideReportValues['organizationalEnvironmentCatAvg'] < 18 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Entorno organizacional</h3>
                            </td>
                            <td  style="width: 20%; background-color: yellow"><h3> Medio</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationalEnvironmentCatAvg'] >= 10 && $guideReportValues['organizationalEnvironmentCatAvg'] < 14 )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Entorno organizacional</h3>
                            </td>
                            <td  style="width: 20%; background-color: green"><h3> Bajo</h3>
                            </td>

                        </tr>
                    @endif
                    @if($guideReportValues['organizationalEnvironmentCatAvg'] < 10  )
                        <tr>
                            <td style="width: 24%;">
                                <h3>Entorno organizacional</h3>
                            </td>
                            <td  style="width: 20%; background-color: dodgerblue"><h3> Nulo o despreciable</h3>
                            </td>

                        </tr>
                    @endif
                    </thead>
                </table>
            @elseif(count($guideReportValues) == 0)
                <h3>No hay encuestas aún</h3>

            @endif
        </div>
    </div>
</div>


