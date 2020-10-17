@extends('layouts.front')
    @section('header')
        <h1>Guias Norma 35</h1>

        @if($guide->is_activated && $guide->guide_type_id == 1)

            @include('front.partial-guide')



        @endif

        @if($guide->is_activated && $guide->guide_type_id == 2)

            @include('front.partial-guide-1')



        @endif

{{-- ------------------------------------guide 2------------------------------------------------------------------------------------------}}

       @if($guide->is_activated && $guide->guide_type_id == 3)
           @include('front.partial-guide-2')
        @endif
        @if(!$guide->is_activated)
            <h1>NO esta activa la guia</h1>
        @endif

        @endsection


@push('scripts')
    @if($guide->is_activated && $guide->guide_type_id == 1)
        <script src="{{ asset('js/front/guide.js') }}"></script>
    @endif
    @if($guide->is_activated && $guide->guide_type_id == 2)
<script src="{{ asset('js/front/guide1.js') }}"></script>
    @endif
    @if($guide->is_activated && $guide->guide_type_id == 3)
        <script src="{{ asset('js/front/guide2.js') }}"></script>
    @endif
@endpush




