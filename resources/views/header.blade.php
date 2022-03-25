<div class="header" id="header-front">
    @if(isset($header) && count($header)>0)
        @foreach($header as $headers)
            <div class="row" id="block-titre" style="background-color: {{ $headers->valeurs }} !important">
        @endforeach
    @else
        <div class="row" id="block-titre" style="background-color: gray!important">
    @endif
        <div class="col-md-3">
            @if(isset($logo_1) && count($logo_1)>0)
                @foreach($logo_1 as $logo_1s)
                    <img src="{{ asset('image_profils') }}/{{ $logo_1s->valeurs }}" class="logo-front-1">
                @endforeach
            @else
                <span class="sans_logo">Logo 1</span>
            @endif
        </div>
        <div class="col-md-6">
            @if(isset($dscrpt) && count($dscrpt)>0)
                @foreach($dscrpt as $dscrpts)
                    <h1><i>{!! html_entity_decode($dscrpts->valeurs) !!}</i></h1>
                @endforeach
            @else
                <h1><i>Description de votre application</i></h1>
            @endif
        </div>
        <div class="col-md-3">
            @if(isset($logo_2) && count($logo_2)>0)
                @foreach($logo_2 as $logo_2s)
                    <img src="{{ asset('image_profils') }}/{{ $logo_2s->valeurs }}" class="logo-front-1">
                @endforeach
            @else
                <span class="sans_logo">Logo 2</span>
            @endif
        </div>
    </div>
    @if(isset($blocks) && count($blocks)>0)
        @foreach($blocks as $blocke)
            <nav class="navbar navbar-inverse" style="background-color: {{ $blocke->valeurs }} !important">
        @endforeach
    @else
        <nav class="navbar navbar-inverse" style="background-color: black!important">
    @endif
        <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ Route('accueil') }}"><i class="fa fa-home"></i><strong> Accueil</strong></a>
            </div>
            <ul class="nav navbar-nav">
              <li><a href="{{ Route('liste') }}"><i class="fa fa-list"></i><strong> Liste evaluer</strong></a></li>
            </ul>
            <ul class="nav navbar-nav" style="margin-left: 60%;font-family: impact;">
              <li><a href="javascript:void(0)">SAISIE @if(session()->get('saisie_user') == 'uns') 1 @else 2 @endif</a></li>
            </ul>
            <ul class="nav navbar-nav"  style="float: right;">
              <li><a href="{{ asset('logout.html') }}"><i class="fa fa-arrow-circle-right"></i><strong> Deconnecter</strong></a></li>
            </ul>
        </div>
    </nav>
</div>
