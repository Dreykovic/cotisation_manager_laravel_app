@extends('base')
@section('body')

    <body class="error-page">

        <div class="main-wrapper">
            <div class="error-box">
                <h3 class="h2 mb-3">M/Mme
                    {{ $membre->user->last_name }} {{ $membre->user->first_name }},voici votre numéro</h3>
                <i class="fas fa-exclamation-circle"></i>
                <h1>{{ $numero }}</h1>

                <p class="h4 font-weight-normal">Merci de pour votre participation</p>

            </div>
        </div>
    </body>
@endsection
