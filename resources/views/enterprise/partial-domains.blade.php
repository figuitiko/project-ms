
<div id="dom_report_event" class="card mt-5">
    <div class="card-header">
        <strong>Dominios Condiciones de trabajo</strong>
        <i style="float:right; cursor: pointer" class="fas fa-window-close"></i>
    </div>
    <div class="card-body">
        @if( $enterprise->guides()->get()->contains('id',2) && count($guideReportValues) > 0)

            @include('enterprise.partial-domains-guide-2')


        @endif
            @if( $enterprise->guides()->get()->contains('id',3) && count($guideReportValues) > 0)

                @include('enterprise.partial-domains-guide-3')


            @endif
    </div>



</div>
