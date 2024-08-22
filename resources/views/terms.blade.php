@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.)
                that doesn't distract from the layout. A practice not without controversy, laying out pages with meaningless
                filler text can be very useful when the focus is meant to be on design, not content.
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
