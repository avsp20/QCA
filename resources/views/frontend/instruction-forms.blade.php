@extends('frontend.master')
@section('content')
<!-- qca group section starts -->
    <section class="qca-group-section">
        <div class="container">
            @if(!empty($main_page) && $instruction_forms != null)
                <div class="title d-inline-block pe-md-5">
                    <strong>{{ $instruction_forms->section1_heading }}</strong>
                </div>
                <div class="description-body">
                    {!! $instruction_forms->section1 !!}
                </div>
            @endif
        </div>
    </section>
<!-- qca group section ends -->
@endsection

