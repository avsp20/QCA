@extends('frontend.master')
@section('content')
<!-- qca group section starts -->
    <section class="qca-group-section">
        <div class="container">
            @if(!empty($main_page) && $qca_legal != null)
                <div class="title d-inline-block pe-md-5">
                    <strong>{{ $qca_legal->section1_heading }}</strong>
                </div>
                <div class="description-body">
                    {!! $qca_legal->section1 !!}
                </div>
            @endif
        </div>
    </section>
<!-- qca group section ends -->
@endsection

