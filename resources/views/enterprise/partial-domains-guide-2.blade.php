<div class="row">

    {{--                ----------work conditions domiain-------------------}}

    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dominio</th>
                <th>Valor</th>
            </tr>
            @if($guideReportValues['workCondDomainAvg']>=9)
                <tr>
                    <td>Condiciones de trabajo</td>
                    <td class="bg-danger" >Muy Alto</td>
                </tr>
            @endif
            @if($guideReportValues['workCondDomainAvg']>=7 && $guideReportValues['workCondDomainAvg'] < 9)
                <tr>
                    <td>Condiciones de trabajo</td>
                    <td style="background-color: orange" >Alto</td>
                </tr>
            @endif
            @if($guideReportValues['workCondDomainAvg']>=5 && $guideReportValues['workCondDomainAvg'] < 7)
                <tr>
                    <td>Condiciones de trabajo</td>
                    <td style="background-color: yellow">Medio</td>
                </tr>
            @endif
            @if($guideReportValues['workCondDomainAvg']>=3 && $guideReportValues['workCondDomainAvg'] < 5)
                <tr>
                    <td>Condiciones de trabajo</td>
                    <td style="background-color: green">Bajo</td>
                </tr>
            @endif
            @if($guideReportValues['workCondDomainAvg'] < 3 )
                <tr>
                    <td>Condiciones de trabajo</td>
                    <td style="background-color: dodgerblue"> Nulo o despreciable</td>
                </tr>
            @endif



            </thead>
        </table>
    </div>
    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dimension</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Condiciones peligrosas e inseguras</td>
                <td>{{$guideReportValues['dangerConditionsDimAvg']}}</td>
            </tr>
            <tr>
                <td>Condiciones deficientes e insalubres</td>
                <td>{{$guideReportValues['unhealthyConditionsDimAvg']}}</td>
            </tr>
            <tr>
                <td>Trabajos peligrosos</td>
                <td>{{$guideReportValues['workDangerousDimAvg']}}</td>
            </tr>
            </thead>
        </table>
    </div>
    <hr>

    {{--                ----------work charge domiain-------------------}}
    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dominio</th>
                <th>Valor</th>
            </tr>
            @if($guideReportValues['workChargeDomAvg']>=24)
                <tr>
                    <td>Carga de trabajo</td>
                    <td class="bg-danger" >Muy Alto</td>
                </tr>
            @endif
            @if($guideReportValues['workChargeDomAvg']>=20 && $guideReportValues['workChargeDomAvg'] < 24)
                <tr>
                    <td>Carga de trabajo</td>
                    <td style="background-color: orange" >Alto</td>
                </tr>
            @endif
            @if($guideReportValues['workChargeDomAvg']>=16 && $guideReportValues['workChargeDomAvg'] < 20)
                <tr>
                    <td>Carga de trabajo</td>
                    <td style="background-color: yellow">Medio</td>
                </tr>
            @endif
            @if($guideReportValues['workChargeDomAvg']>=12 && $guideReportValues['workChargeDomAvg'] < 16)
                <tr>
                    <td>Carga de trabajo</td>
                    <td style="background-color: green">Bajo</td>
                </tr>
            @endif
            @if($guideReportValues['workChargeDomAvg'] < 12 )
                <tr>
                    <td>Carga de trabajo</td>
                    <td style="background-color: dodgerblue"> Nulo o despreciable</td>
                </tr>
            @endif



            </thead>
        </table>
    </div>
    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dimension</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Cargas cuantitativas</td>
                <td>{{$guideReportValues['quantitativeDemandsDimAvg']}}</td>
            </tr>
            <tr>
                <td>Ritmos de trabajo acelerado</td>
                <td>{{$guideReportValues['accelerateWorkDimAvg']}}</td>
            </tr>
            <tr>
                <td>Carga mental</td>
                <td>{{$guideReportValues['mentalChargeDemandsDimAvg']}}</td>
            </tr>
            <tr>
                <td>Cargas psicológicas emocionales</td>
                <td>{{$guideReportValues['psychologicalDemandsDimAvg']}}</td>
            </tr>
            <tr>
                <td>Cargas de alta responsabilidad</td>
                <td>{{$guideReportValues['responsibilityDemandsDimAvg']}}</td>
            </tr>
            <tr>
                <td>Cargas contradictorias o inconsistentes</td>
                <td>{{$guideReportValues['contradictoryDemandsDimAvg']}}</td>
            </tr>
            </thead>
        </table>
    </div>
    <hr>

    {{--                ----------lack of control domiain-------------------}}
    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dominio</th>
                <th>Valor</th>
            </tr>
            @if($guideReportValues['lackOfControlDomAvg']>=14)
                <tr>
                    <td>Falta de control sobre el trabajo</td>
                    <td class="bg-danger" >Muy Alto</td>
                </tr>
            @endif
            @if($guideReportValues['lackOfControlDomAvg']>=11 && $guideReportValues['lackOfControlDomAvg'] < 14)
                <tr>
                    <td>Falta de control sobre el trabajo</td>
                    <td style="background-color: orange" >Alto</td>
                </tr>
            @endif
            @if($guideReportValues['lackOfControlDomAvg']>=8 && $guideReportValues['lackOfControlDomAvg'] < 11)
                <tr>
                    <td>Falta de control sobre el trabajo</td>
                    <td style="background-color: yellow">Medio</td>
                </tr>
            @endif
            @if($guideReportValues['lackOfControlDomAvg']>=5 && $guideReportValues['lackOfControlDomAvg'] < 8)
                <tr>
                    <td>Falta de control sobre el trabajo</td>
                    <td style="background-color: green">Bajo</td>
                </tr>
            @endif
            @if($guideReportValues['lackOfControlDomAvg'] < 5 )
                <tr>
                    <td>Falta de control sobre el trabajo</td>
                    <td style="background-color: dodgerblue"> Nulo o despreciable</td>
                </tr>
            @endif



            </thead>
        </table>
    </div>
    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dimension</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Falta de control y autonomía sobre el trabajo</td>
                <td>{{$guideReportValues['lackOfControlAutonomyDimAvg']}}</td>
            </tr>
            <tr>
                <td>Limitada o nula posibilidad de desarrollo</td>
                <td>{{$guideReportValues['nullPossibilitiesDevelopmentDimAvg']}}</td>
            </tr>
            <tr>
                <td>Limitada o inexistente capacitación</td>
                <td>{{$guideReportValues['limitNonexistentDimAvg']}}</td>
            </tr>


            </thead>
        </table>
    </div>
    <hr>

    {{--                ----------work day domiain-------------------}}


    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dominio</th>
                <th>Valor</th>
            </tr>
            @if($guideReportValues['workDayDomAvg']>=6)
                <tr>
                    <td>Jornada de trabajo</td>
                    <td class="bg-danger" >Muy Alto</td>
                </tr>
            @endif
            @if($guideReportValues['workDayDomAvg']>=4 && $guideReportValues['workDayDomAvg'] < 6)
                <tr>
                    <td>Jornada de trabajo</td>
                    <td style="background-color: orange" >Alto</td>
                </tr>
            @endif
            @if($guideReportValues['workDayDomAvg']>=2 && $guideReportValues['workDayDomAvg'] < 4)
                <tr>
                    <td>Jornada de trabajo</td>
                    <td style="background-color: yellow">Medio</td>
                </tr>
            @endif
            @if($guideReportValues['workDayDomAvg']>=1 && $guideReportValues['workDayDomAvg'] < 2)
                <tr>
                    <td>Jornada de trabajo</td>
                    <td style="background-color: green">Bajo</td>
                </tr>
            @endif
            @if($guideReportValues['workDayDomAvg'] < 1 )
                <tr>
                    <td>Jornada de trabajo</td>
                    <td style="background-color: dodgerblue"> Nulo o despreciable</td>
                </tr>
            @endif



            </thead>
        </table>
    </div>
    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dimension</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Jornadas de trabajo extensas</td>
                <td>{{$guideReportValues['bigWorkDayDimAvg']}}</td>
            </tr>

            </thead>
        </table>
    </div>
    <hr>

    {{--                ----------Interferencia en la relación trabajo- familia domiain-------------------}}

    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dominio</th>
                <th>Valor</th>
            </tr>
            @if($guideReportValues['interferenceWorkFamilyDomAvg']>=6)
                <tr>
                    <td>Interferencia en la relación trabajo- familia</td>
                    <td class="bg-danger" >Muy Alto</td>
                </tr>
            @endif
            @if($guideReportValues['interferenceWorkFamilyDomAvg']>=4 && $guideReportValues['interferenceWorkFamilyDomAvg'] < 6)
                <tr>
                    <td>Interferencia en la relación trabajo- familia</td>
                    <td style="background-color: orange" >Alto</td>
                </tr>
            @endif
            @if($guideReportValues['interferenceWorkFamilyDomAvg']>=2 && $guideReportValues['interferenceWorkFamilyDomAvg'] < 4)
                <tr>
                    <td>Interferencia en la relación trabajo- familia</td>
                    <td style="background-color: yellow">Medio</td>
                </tr>
            @endif
            @if($guideReportValues['interferenceWorkFamilyDomAvg']>=1 && $guideReportValues['interferenceWorkFamilyDomAvg'] < 2)
                <tr>
                    <td>Interferencia en la relación trabajo- familia</td>
                    <td style="background-color: green">Bajo</td>
                </tr>
            @endif
            @if($guideReportValues['interferenceWorkFamilyDomAvg'] < 1 )
                <tr>
                    <td>Interferencia en la relación trabajo- familia</td>
                    <td style="background-color: dodgerblue"> Nulo o despreciable</td>
                </tr>
            @endif



            </thead>
        </table>
    </div>
    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dimension</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Influencia del trabajo fuera del centro laboral</td>
                <td>{{$guideReportValues['influenceOutWorkDimAvg']}}</td>
            </tr>
            <tr>
                <td>Influencia de las responsabilidades familiares</td>
                <td>{{$guideReportValues['influenceFamilyResponsibilityDimAvg']}}</td>
            </tr>

            </thead>
        </table>
    </div>
    <hr>

    {{------------Liderazgo domiain-------------------}}

    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dominio</th>
                <th>Valor</th>
            </tr>
            @if($guideReportValues['leadershipDomAvg']>=11)
                <tr>
                    <td>Liderazgo</td>
                    <td class="bg-danger" >Muy Alto</td>
                </tr>
            @endif
            @if($guideReportValues['leadershipDomAvg']>=8 && $guideReportValues['leadershipDomAvg'] < 11)
                <tr>
                    <td>Liderazgo</td>
                    <td style="background-color: orange" >Alto</td>
                </tr>
            @endif
            @if($guideReportValues['leadershipDomAvg']>=5 && $guideReportValues['leadershipDomAvg'] < 8)
                <tr>
                    <td>Liderazgo</td>
                    <td style="background-color: yellow">Medio</td>
                </tr>
            @endif
            @if($guideReportValues['leadershipDomAvg']>=3 && $guideReportValues['leadershipDomAvg'] < 5)
                <tr>
                    <td>Liderazgo</td>
                    <td style="background-color: green">Bajo</td>
                </tr>
            @endif
            @if($guideReportValues['leadershipDomAvg'] < 3 )
                <tr>
                    <td>Liderazgo</td>
                    <td style="background-color: dodgerblue"> Nulo o despreciable</td>
                </tr>
            @endif



            </thead>
        </table>
    </div>
    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dimension</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Escasa claridad de funciones</td>
                <td>{{$guideReportValues['scarcityClearFunctionsDimAvg']}}</td>
            </tr>
            <tr>
                <td>Características del liderazgo</td>
                <td>{{$guideReportValues['leadershipFeaturesDimAvg']}}</td>
            </tr>

            </thead>
        </table>
    </div>
    <hr>

    {{------------Relaciones en el trabajo domiain-------------------}}

    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dominio</th>
                <th>Valor</th>
            </tr>
            @if($guideReportValues['workRelationDomAvg']>=14)
                <tr>
                    <td>Relaciones en el trabajo</td>
                    <td class="bg-danger" >Muy Alto</td>
                </tr>
            @endif
            @if($guideReportValues['workRelationDomAvg']>=11 && $guideReportValues['workRelationDomAvg'] < 14)
                <tr>
                    <td>Relaciones en el trabajo</td>
                    <td style="background-color: orange" >Alto</td>
                </tr>
            @endif
            @if($guideReportValues['workRelationDomAvg']>=8 && $guideReportValues['workRelationDomAvg'] < 11)
                <tr>
                    <td>Relaciones en el trabajo</td>
                    <td style="background-color: yellow">Medio</td>
                </tr>
            @endif
            @if($guideReportValues['workRelationDomAvg']>=5 && $guideReportValues['workRelationDomAvg'] < 8)
                <tr>
                    <td>Relaciones en el trabajo</td>
                    <td style="background-color: green">Bajo</td>
                </tr>
            @endif
            @if($guideReportValues['workRelationDomAvg'] < 5 )
                <tr>
                    <td>Relaciones en el trabajo</td>
                    <td style="background-color: dodgerblue"> Nulo o despreciable</td>
                </tr>
            @endif



            </thead>
        </table>
    </div>
    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dimension</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Relaciones sociales en el trabajo</td>
                <td>{{$guideReportValues['socialRelationDimAvg']}}</td>
            </tr>
            <tr>
                <td>Deficiente relación con los colaboradores que supervisa</td>
                <td>{{$guideReportValues['deficientRelationBossDimAvg']}}</td>
            </tr>

            </thead>
        </table>
    </div>
    <hr>

    {{------------Violencia domiain-------------------}}

    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dominio</th>
                <th>Valor</th>
            </tr>
            @if($guideReportValues['violenceDomAvg']>=16)
                <tr>
                    <td>Violencia</td>
                    <td class="bg-danger" >Muy Alto</td>
                </tr>
            @endif
            @if($guideReportValues['violenceDomAvg']>=13 && $guideReportValues['violenceDomAvg'] < 16)
                <tr>
                    <td>Violencia</td>
                    <td style="background-color: orange" >Alto</td>
                </tr>
            @endif
            @if($guideReportValues['violenceDomAvg']>=10 && $guideReportValues['violenceDomAvg'] < 13)
                <tr>
                    <td>Violencia</td>
                    <td style="background-color: yellow">Medio</td>
                </tr>
            @endif
            @if($guideReportValues['violenceDomAvg']>=7 && $guideReportValues['violenceDomAvg'] < 10)
                <tr>
                    <td>Violencia</td>
                    <td style="background-color: green">Bajo</td>
                </tr>
            @endif
            @if($guideReportValues['violenceDomAvg'] < 7 )
                <tr>
                    <td>Violencia</td>
                    <td style="background-color: dodgerblue"> Nulo o despreciable</td>
                </tr>
            @endif



            </thead>
        </table>
    </div>
    <div class="col-6">
        <table id="datatable-responsive-basic" class="table table-striped table-bordered dt-responsive"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Dimension</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Relaciones sociales en el trabajo</td>
                <td>{{$guideReportValues['workViolenceDimAvg']}}</td>
            </tr>


            </thead>
        </table>
    </div>




</div>
