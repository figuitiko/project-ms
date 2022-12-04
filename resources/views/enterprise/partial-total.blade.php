<div id="total_report" class="card mt-5">
    <div class="card-header">
        <strong>Resultado total</strong>
        <i style="float:right; cursor: pointer" class="fas fa-window-close"></i>
    </div>
    <div class="card-body">
        <div  class="row">
            @if(count($guideReportValues) > 0 )
                <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="width: 20%;">Nivel de Riesgo</th>
                        <th style="width: 24%;">Necesidad de Acción</th>
                    </tr>

                    @if($guideReportValues['totalValueGuideAvg'] > 90)
                        <tr>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>
                            <td style="width: 24%;">Se requiere realizar el análisis de cada categoría y dominio para establecer las acciones de intervención apropiadas, mediante un Programa de intervención que deberá incluir evaluaciones específicas1, y contemplar campañas de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.
                            </td>
                        </tr>
                    @endif
                    @if($guideReportValues['totalValueGuideAvg'] > 70 && $guideReportValues['totalValueGuideAvg'] < 90 )
                        <tr>
                            <td   style="width: 20%; background-color: orange"><h3>Alto</h3>
                            </td>
                            <td style="width: 24%;">Se requiere realizar un análisis de cada categoría y dominio, de manera que se puedan determinar las acciones de intervención apropiadas a través de un Programa de intervención, que podrá incluir una evaluación específica1 y deberá incluir una campaña de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional
                                favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.

                            </td>
                        </tr>
                    @endif
                    @if($guideReportValues['totalValueGuideAvg'] > 45 && $guideReportValues['totalValueGuideAvg'] < 70 )
                        <tr>
                            <td   style="width: 20%; background-color: yellow"><h3>Medio</h3>
                            </td>
                            <td style="width: 24%;">Se requiere revisar la política de prevención de riesgos psicosociales y
                                programas para la prevención de los factores de riesgo psicosocial, la
                                promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión, mediante un Programa de intervención.
                            </td>
                        </tr>
                    @endif
                    @if($guideReportValues['totalValueGuideAvg'] > 20 && $guideReportValues['totalValueGuideAvg'] < 45 )
                        <tr>
                            <td   style="width: 20%; background-color: green"><h3>Bajo</h3>
                            </td>
                            <td style="width: 24%;">Es necesario una mayor difusión de la política de prevención de riesgos
                                psicosociales y programas para: la prevención de los factores de riesgo
                                psicosocial, la promoción de un entorno organizacional favorable y la
                                prevención de la violencia laboral.

                            </td>
                        </tr>
                    @endif
                    @if($guideReportValues['totalValueGuideAvg'] < 20  )
                        <tr>
                            <td   style="width: 20%; background-color: dodgerblue"><h3>Bajo</h3>
                            </td>
                            <td style="width: 24%;">El riesgo resulta despreciable por lo que no se requiere medidas adicionales.


                            </td>
                        </tr>
                    @endif
                    </thead>
                </table>

            @endif
            @if(count($guideReportValues) > 0  )
                <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="width: 20%;">Nivel de Riesgo</th>
                        <th style="width: 24%;">Necesidad de Acción</th>
                    </tr>

                    @if($guideReportValues['totalValueGuideAvg'] > 140)
                        <tr>
                            <td class="bg-danger" style="width: 20%;"><h3>Muy Alto</h3>
                            </td>
                            <td style="width: 24%;">Se requiere realizar el análisis de cada categoría y dominio para establecer las acciones de intervención apropiadas, mediante un Programa de intervención que deberá incluir evaluaciones específicas1, y contemplar campañas de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.
                            </td>
                        </tr>
                    @endif
                    @if($guideReportValues['totalValueGuideAvg'] > 99 && $guideReportValues['totalValueGuideAvg'] < 140 )
                        <tr>
                            <td   style="width: 20%; background-color: orange"><h3>Alto</h3>
                            </td>
                            <td style="width: 24%;">Se requiere realizar un análisis de cada categoría y dominio, de manera que se puedan determinar las acciones de intervención apropiadas a través de un Programa de intervención, que podrá incluir una evaluación específica1 y deberá incluir una campaña de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional
                                favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.

                            </td>
                        </tr>
                    @endif
                    @if($guideReportValues['totalValueGuideAvg'] > 75 && $guideReportValues['totalValueGuideAvg'] < 99 )
                        <tr>
                            <td   style="width: 20%; background-color: yellow"><h3>Medio</h3>
                            </td>
                            <td style="width: 24%;">Se requiere revisar la política de prevención de riesgos psicosociales y
                                programas para la prevención de los factores de riesgo psicosocial, la
                                promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión, mediante un Programa de intervención.
                            </td>
                        </tr>
                    @endif
                    @if($guideReportValues['totalValueGuideAvg'] > 50 && $guideReportValues['totalValueGuideAvg'] < 75 )
                        <tr>
                            <td   style="width: 20%; background-color: green"><h3>Bajo</h3>
                            </td>
                            <td style="width: 24%;">Es necesario una mayor difusión de la política de prevención de riesgos
                                psicosociales y programas para: la prevención de los factores de riesgo
                                psicosocial, la promoción de un entorno organizacional favorable y la
                                prevención de la violencia laboral.

                            </td>
                        </tr>
                    @endif
                    @if($guideReportValues['totalValueGuideAvg'] < 50  )
                        <tr>
                            <td   style="width: 20%; background-color: dodgerblue"><h3>Bajo</h3>
                            </td>
                            <td style="width: 24%;">El riesgo resulta despreciable por lo que no se requiere medidas adicionales.


                            </td>
                        </tr>
                    @endif
                    </thead>
                </table>

            @elseif(count($guideReportValues) == 0)
                <h3> No hay encuestas aún</h3>

            @endif


        </div>
    </div>
</div>


