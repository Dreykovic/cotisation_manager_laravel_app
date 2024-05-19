@extends('base')

@section('body')
    @guest
        @yield('membres-guest')

    @endguest
    @auth

        <div class="main-wrapper">


            @include('layouts.header')

            @include('layouts.sidebar-navs')
            @yield('membres-auth')


        </div>
    @endauth
@endsection
