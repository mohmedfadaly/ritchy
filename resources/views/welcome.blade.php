@extends('front.layouts.app')

@section('style')
<title>وصل - الرئيسية</title>

@endsection
@section('content')
<!-- START:: HEADER -->
@if(auth()->guard('customer')->check())
    @if(auth()->guard('customer')->user()->active == 0)
        @include('front.home.home_vrayfiy')

    @else
        @include('front.home.home')

    @endif


@else

@include('front.home.home_guest')

@endif

@endsection
