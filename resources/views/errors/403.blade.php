@extends('base')
@section('body')

    <body class="error-page">

        <div class="main-wrapper">
            <div class="error-box">
                <h1>403</h1>
                <h3 class="h2 mb-3"><i class="fas fa-exclamation-circle"></i> Oops! Something went wrong</h3>
                <p class="h4 font-weight-normal">The page you requested was not found.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </body>
@endsection
