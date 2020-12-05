@extends('layouts.app')

@section('title')
 CONTACTER NOUS
@endsection

@section('header')
 <style type="text/css">
 	.uppercase{
 		text-transform: uppercase;
 	}
    .header__menu ul li.contact a {
    color: #007bff;
}
 </style>
@endsection

@section('content')
  <section class="breadcrumb-section set-bg" data-setbg="/designe/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 class="uppercase">Contactez-nous</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/home')}}">ACCUIEL</a>
                            <span>Contacter nous</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact spad" style="margin-top: 40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="fa fa-phone"></span>
                        <h4>TELEPHONE</h4>
                        <p>+213{{getsetting()->site_phone}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="fa fa-map-marker"></span>
                        <h4>ADRESS</h4>
                        <p>{{getsetting()->adress}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="fa fa-clock-o"></span>
                        <h4>TEMPS DE TRAVAIL</h4>
                        <p>9:00 am à 18:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="fa fa-envelope-o"></span>
                        <h4>Email</h4>
                        <p>{{getsetting()->site_email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>CONATACTER NOUS</h2>
                    </div>
                </div>
            </div>
 			{!! Form::open(['url'=>'/contact', 'method'=>'POST'])!!}
                 <div class="row">
                    <div class="col-lg-4 col-md-4">
                    	 <input type="text" placeholder="Nom et prénom" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                         @error('name')
                                        
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-lg-4 col-md-4">
                       <input type="text" placeholder="Objet" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{old('subject')}}">
                                         @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <input type="email" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                                         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    
                    <div class="col-lg-12 text-center">
                        <textarea name="message" cols="30" rows="10" placeholder="Message" class="form-control @error('message') is-invalid @enderror" value="{{old('message')}}"></textarea>
                                 @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <button type="submit" class="site-btn" >ENVOYER LE MESSAGE</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('footer')
 
@endsection