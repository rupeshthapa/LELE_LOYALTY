@extends('layouts.app')

@section('content')
    <main>
        <div class="">
            @include('pages.home')
            @include('pages.about')
            @include('pages.feature')
            @include('pages.contact')
            @include('pages.testimonials')


            <button class="back-to-top-btn" onclick="scrollToTop()">
                <i class="fas fa-arrow-up"></i>
                <span class="hover-text">Back To Top</span>
            </button>
        </div>
    </main>
   
@endsection
