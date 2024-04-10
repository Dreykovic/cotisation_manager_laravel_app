@extends('base')
@section('body')
    @guest

        @yield('guest-content')


    @endguest
    @auth

        <div class="main-wrapper">


            @include('layouts.header')

            @include('layouts.sidebar-navs')
            @yield('auth-content')


        </div>
    @endauth
@endsection
