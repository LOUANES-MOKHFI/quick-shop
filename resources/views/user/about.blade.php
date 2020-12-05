@extends('layouts.app')

@section('title')
 QUI SOMMES NOUS
@endsection

@section('header')
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

 <style type="text/css">
 	.uppercase{
 		text-transform: uppercase;
 	}
.card {
    cursor: pointer
}

.hd {
    font-size: 25px;
    font-weight: 550
}

.card.hover,
.card:hover {
    box-shadow: 0 20px 40px rgba(0, 0, 0, .2)
}

.img {
    margin-bottom: 35px;
    -webkit-filter: drop-shadow(5px 5px 5px #222);
    filter: drop-shadow(5px 5px 5px #222)
}

.card-title {
    font-weight: 600
}

button.focus,
button:focus {
    outline: 0;
    box-shadow: none !important
}

.ft {
    margin-top: 25px
}

.chk {
    margin-bottom: 5px
}

.rck {
    margin-top: 20px;
    padding-bottom: 15px
}


/*timeline*/

a {
    text-decoration: none
}


/*h4{text-align:center;margin:30px 0;color:#444}*/


.main-timeline3 {
    overflow: hidden;
    position: relative
}

.main-timeline3 .timeline {
    position: relative;
    margin-top: -79px
}

.main-timeline3 .timeline:first-child {
    margin-top: 0
}

.main-timeline3 .timeline-icon,
.main-timeline3 .year {
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0
}

.main-timeline3 .timeline:after,
.main-timeline3 .timeline:before {
    content: "";
    display: block;
    width: 100%;
    clear: both
}

.main-timeline3 .timeline:before {
    content: "";
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2
}

.main-timeline3 .timeline-icon {
    width: 210px;
    height: 210px;
    border-radius: 50%;
    border: 25px solid transparent;
    border-top-color: #f44556;
    border-right-color: #f44556;
    z-index: 1;
    transform: rotate(45deg)
}

.main-timeline3 .year {
    display: block;
    width: 110px;
    height: 110px;
    line-height: 110px;
    border-radius: 50%;
    background: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, .4);
    font-size: 30px;
    font-weight: 700;
    color: #f44556;
    text-align: center;
    transform: rotate(-45deg)
}

.main-timeline3 .timeline-content {
    width: 35%;
    float: right;
    background: #f44556;
    padding: 30px 20px;
    margin: 50px 0;
    box-shadow: 0 10px 25px -10px rgba(72, 29, 99, .3);
    z-index: 1;
    position: relative
}

.main-timeline3 .timeline-content:before {
    content: "";
    width: 20%;
    height: 15px;
    background: #f44556;
    position: absolute;
    top: 50%;
    left: -20%;
    z-index: -1;
    transform: translateY(-50%)
}

.main-timeline3 .title {
    font-size: 20px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 10px
}

.main-timeline3 .description {
    font-size: 16px;
    color: #fff;
    line-height: 24px;
    margin: 0
}

.main-timeline3 .timeline:nth-child(2n) .timeline-icon {
    transform: rotate(-135deg);
    border-top-color: #e97e2e;
    border-right-color: #e97e2e
}

.main-timeline3 .timeline:nth-child(2n) .year {
    transform: rotate(135deg);
    color: #e97e2e
}

.main-timeline3 .timeline:nth-child(2n) .timeline-content {
    float: left
}

.main-timeline3 .timeline:nth-child(2n) .timeline-content:before {
    left: auto;
    right: -20%
}

.main-timeline3 .timeline:nth-child(2n) .timeline-content,
.main-timeline3 .timeline:nth-child(2n) .timeline-content:before {
    background: #e97e2e
}

.main-timeline3 .timeline:nth-child(3n) .timeline-icon {
    border-top-color: #13afae;
    border-right-color: #13afae
}

.main-timeline3 .timeline:nth-child(3n) .year {
    color: #13afae
}

.main-timeline3 .timeline:nth-child(3n) .timeline-content,
.main-timeline3 .timeline:nth-child(3n) .timeline-content:before {
    background: #13afae
}

.main-timeline3 .timeline:nth-child(4n) .timeline-icon {
    border-top-color: #105572;
    border-right-color: #105572
}

.main-timeline3 .timeline:nth-child(4n) .year {
    color: #105572
}

.main-timeline3 .timeline:nth-child(4n) .timeline-content,
.main-timeline3 .timeline:nth-child(4n) .timeline-content:before {
    background: #105572
}

@media only screen and (max-width:1199px) {
    .main-timeline3 .timeline {
        margin-top: -103px
    }
    .main-timeline3 .timeline-content:before {
        left: -18%
    }
    .main-timeline3 .timeline:nth-child(2n) .timeline-content:before {
        right: -18%
    }
}

@media only screen and (max-width:990px) {
    .main-timeline3 .timeline {
        margin-top: -127px
    }
    .main-timeline3 .timeline-content:before {
        left: -2%
    }
    .main-timeline3 .timeline:nth-child(2n) .timeline-content:before {
        right: -2%
    }
}

@media only screen and (max-width:767px) {
    .main-timeline3 .timeline {
        margin-top: 0;
        overflow: hidden
    }
    .main-timeline3 .timeline:before,
    .main-timeline3 .timeline:nth-child(2n):before {
        box-shadow: none
    }
    .main-timeline3 .timeline-icon,
    .main-timeline3 .timeline:nth-child(2n) .timeline-icon {
        margin-top: -30px;
        margin-bottom: 20px;
        position: relative;
        transform: rotate(135deg)
    }
    .main-timeline3 .timeline:nth-child(2n) .year,
    .main-timeline3 .year {
        transform: rotate(-135deg)
    }
    .main-timeline3 .timeline-content,
    .main-timeline3 .timeline:nth-child(2n) .timeline-content {
        width: 100%;
        float: none;
        border-radius: 0 0 20px 20px;
        text-align: center;
        padding: 25px 20px;
        margin: 0 auto
    }
    .main-timeline3 .timeline-content:before,
    .main-timeline3 .timeline:nth-child(2n) .timeline-content:before {
        width: 15px;
        height: 25px;
        position: absolute;
        top: -22px;
        left: 50%;
        z-index: -1;
        transform: translate(-50%, 0)
    }
}

 .counter-section i {
     display: block;
     margin: 0 0 10px
 }

 .counter-section span.counter {
     font-size: 40px;
     color: #000;
     line-height: 60px;
     display: block;
     font-family: "Oswald", sans-serif;
     letter-spacing: 2px
 }

 .counter-title {
     font-size: 12px;
     letter-spacing: 2px;
     text-transform: uppercase
 }

 .counter-icon {
     top: 25px;
     position: relative
 }

 .counter-style2 .counter-title {
     letter-spacing: 0.55px;
     float: left
 }

 .counter-style2 span.counter {
     letter-spacing: 0.55px;
     float: left;
     margin-right: 10px
 }

 .counter-style2 i {
     float: right;
     line-height: 26px;
     margin: 0 10px 0 0
 }

 .counter-subheadline span {
     float: right
 }

 .medium-icon {
     font-size: 40px !important;
     margin-bottom: 15px !important
 }

 
 </style>

@endsection

@section('content')
 <section class="breadcrumb-section set-bg" data-setbg="/designe/img/breadcrumb.jpg" style="margin-bottom: 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 class="uppercase">Qui sommes nous</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/home')}}">ACCUIEL</a>
                            <span>Qui sommes nous</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<main>
   
    <div class="container">
        <h3 class="card-title">A PROPOS DE : <span style="color: blue;font-family: italic">{{getsetting()->site_name}}</span></h3>
        <div class="col-md-12">
            <p align="left">
                <span style="text-transform: uppercase;">{{getsetting()->site_name}}</span>
                Un Site Web E-commerce Algerien Pour La Vente Des Produits En Ligne.</br>
                Le Vente Se Fait Par Une Réservation En Ligne.</br>
                Notre Site Vous Offres Des Produits Avec Des Bons Prix.</br>



            </p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-timeline3">
                    <div class="timeline">
                        <div class="timeline-icon"><span class="year" style="font-size: 25px">MISSION</span></div>
                        <div class="timeline-content">
                            <h3 class="title">{{getsetting()->site_name}}</h3>
                            <p class="description">
                               Un Site Web Pour La Vente Des Produits Dans Notre Boutique.
                            </p>
                        </div>
                    </div>
                    <div class="timeline">
                        <div class="timeline-icon"><span class="year" style="font-size: 25px">MISSION</span></div>
                        <div class="timeline-content">
                            <h3 class="title">{{getsetting()->site_name}}</h3>
                            <p class="description">
                                Un Site Web Pour La Vente Et La Réservation Des Produits En Ligne.
                            </p>
                        </div>
                    </div>
                    <div class="timeline">
                        <div class="timeline-icon"><span class="year" style="font-size: 25px">VISION</span></div>
                        <div class="timeline-content">
                            <h3 class="title">{{getsetting()->site_name}}</h3>
                            <p class="description">
                                Notre Site Est Votre Nouvelle Premier Destination Pour Les Achats En Ligne. 
                            </p>
                        </div>
                    </div>
                    <div class="timeline">
                        <div class="timeline-icon"><span class="year" style="font-size: 25px">VISION</span></div>
                        <div class="timeline-content">
                            <h3 class="title">{{getsetting()->site_name}}</h3>
                            <p class="description">
                                Nous Sommes Très Désireux Chez {{getsetting()->site_name}} De Fournir Des Produits De Haute Qualité.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</main>
 
    <div class='container-fluid mx-auto mt-5 mb-5 col-12 body' style="text-align: center ;margin-bottom:30px">
        <div class="hd">NOS SERVICES</div>
            <p><small class="text-muted" style="font-size: 20px">Site Web Pour La Vente Et Laivraison Des Produits En Ligne.</small></p>
            <div class="row" style="justify-content: center">
                <div class="card col-md-3 col-12">
                    <div class="card-content">
                        <div class="card-body"> <img class="img" src="/designe/img/laivrasion.png"  height="120" />
                            <div class="shadow"></div>
                            <div class="card-title"> Livraison Des Produits </div>
                            <div class="card-subtitle">
                                <p> <small class="text-muted">Nous Offrons A Vous Une Possibilite De Livraison Des Produits A Vos Adress</small> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-3 col-12 ml-2">
                    <div class="card-content">
                        <div class="card-body"> <img class="img" src="/designe/img/cash-pay.png" height="120" />
                            <div class="card-title"> Paiement à La Réception
            </div>
                    <div class="card-subtitle">
                        <p> <small class="text-muted"> Le Paiement Se Fait Main a main Avec La Réception Des Commandes Pour Assurer La Fidelite Des Clients Avec Notre Boutique </small> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body"> <img class="img rck" src="/designe/img/seca.png" height="120"  />
                    <div class="card-title"> Sécurite Des Informations </div>
                    <div class="card-subtitle">
                        <p> <small class="text-muted">{{getsetting()->site_name}} Garentit Une Protection Total De Vos Informations Personnelle</small> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
<section class="wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;" style="border-bottom: 1px solid red">
    <div class="container">
        <div class="row">
            <!-- counter -->
            <div class="col-md-4 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;"> 
                <i class="fa fa-list-alt medium-icon" style="color: #007bff"></i> <span id="anim-number-pizza" class="counter-number"></span> 
                <span class="timer counter alt-font appear" data-to="980" data-speed="7000">{{count(All_Category())}}</span>
                <span class="counter-title" style="font-size: 20px;font-weight: bold">CATEGORIES</span>
            </div> <!-- end counter -->
            <!-- counter -->
            <div class="col-md-4 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="600ms" style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;"> 
                <i class="fa fa-user medium-icon" style="color: #007bff"></i> <span class="timer counter alt-font appear" data-to="980" data-speed="7000">{{count(All_Client())}}</span>
                 <span class="counter-title" style="font-size: 20px;font-weight: bold"> Clients</span> 
             </div> <!-- end counter -->
            <!-- counter -->
            <div class="col-md-4 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated" data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;"> 
                <i class="fa fa-product-hunt medium-icon" style="color: #007bff"></i> <span class="timer counter alt-font appear" data-to="810" data-speed="7000">{{count(All_Product())}}</span> 
                <span class="counter-title" style="font-size: 20px;font-weight: bold">PRODUITS</span> 
            </div> <!-- end counter -->
        </div>
    </div>
    <hr>
</section>
@endsection

@section('footer')
 <script type="text/javascript">
     $(document).ready(function() {

$('.counter').each(function () {
$(this).prop('Counter',0).animate({
Counter: $(this).text()
}, {
duration: 4000,
easing: 'swing',
step: function (now) {
$(this).text(Math.ceil(now));
}
});
});

});
 </script>
@endsection