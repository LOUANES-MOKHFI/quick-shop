@extends('layouts.app')

@section('title')
 Erreur 404
@endsection

@section('header')
<style type="text/css">
	.body {
    height: 100%
}

.body {
    display: grid;
    place-items: center;
    font-family: 'Manrope', sans-serif;
    background: linear-gradient(234deg, #0540f9, #1c1d21);
    background-size: 400% 400%;
    -webkit-animation: animbackground 18s ease infinite;
    -moz-animation: animbackground 18s ease infinite;
    animation: animbackground 18s ease infinite;
    color: #fff
}

	@-webkit-keyframes animbackground {
    0% {
        background-position: 82% 0%
    }

    50% {
        background-position: 19% 100%
    }

    100% {
        background-position: 82% 0%
    }
}

@-moz-keyframes animbackground {
    0% {
        background-position: 82% 0%
    }

    50% {
        background-position: 19% 100%
    }

    100% {
        background-position: 82% 0%
    }
}

@keyframes animbackground {
    0% {
        background-position: 82% 0%
    }

    50% {
        background-position: 19% 100%
    }

    100% {
        background-position: 82% 0%
    }
}

.not-found {
    font-size: 186px;
    font-weight: 700
}

.send {
    color: #fff;
    background-color: #083ad6;
    border-color: #083ad6
}

.send:hover {
    color: #fff;
    background-color: #083ad6;
    border-color: #083ad6
}
</style>
@endsection

@section('content')
<div class="body">
<div class="container-fluid text-center">
    <div class="px-5 py-5">
        <h1 class="not-found">404</h1>
        <h3>Erreur 404 - page n'existe pas</h3>
        <div class="text-center mt-4 mb-5"> <a href="{{url('/home')}}" class="btn btn-success send px-3"><i class="fa fa-long-arrow-left mr-1"></i> Retour vers la page d'accueil</a> </div>
    </div>
</div>
</div>
@endsection

@section('footer')

@endsection