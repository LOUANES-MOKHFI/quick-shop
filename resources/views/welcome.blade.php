@extends('layouts.app')

@section('title')
 Accueil
@endsection

@section('header')
<link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">

 <style type="text/css">
       .header__menu ul li.home a {
    color: #007bff;
}
  .product-details a {
        color: black;
    }
    .product-details a:hover{
        color: blue;
    }
    #myCarousel .carousel-item .mask {
    position: absolute;
    top: 0;
    left:0;
    height:100%;
    width: 100%;
    background-attachment: fixed;
}
#myCarousel h4{
    font-size:50px;
    margin-bottom:15px;
    color:#FFF;
    line-height:100%;
    letter-spacing:0.5px;
    font-weight:600;
}
#myCarousel p{
    font-size:18px;
    margin-bottom:15px;
    color:#d5d5d5;
}
#myCarousel .carousel-item a{background:#F47735; font-size:14px; color:#FFF; padding:13px 32px; display:inline-block; }
#myCarousel .carousel-item a:hover{background:#394fa2; text-decoration:none;  }

#myCarousel .carousel-item h4{-webkit-animation-name:fadeInLeft; animation-name:fadeInLeft;} 
#myCarousel .carousel-item p{-webkit-animation-name:slideInRight; animation-name:slideInRight;} 
#myCarousel .carousel-item a{-webkit-animation-name:fadeInUp; animation-name:fadeInUp;}
#myCarousel .carousel-item .mask img{-webkit-animation-name:slideInRight; animation-name:slideInRight; display:block; height:auto; max-width:100%;}
#myCarousel h4, #myCarousel p, #myCarousel a, #myCarousel .carousel-item .mask img{-webkit-animation-duration: 1s;
    animation-duration: 1.2s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
#myCarousel .container {max-width: 1430px;  }
#myCarousel .carousel-item{height:100%; min-height:550px; }
#myCarousel{position:relative; z-index:1; background:url(https://i.imgur.com/6axE29k.jpg) center center no-repeat; background-size:cover; }

.carousel-control-next, .carousel-control-prev{height:40px; width:40px; padding:12px; top:50%; bottom:auto; transform:translateY(-50%); background-color: #f47735; }


.carousel-item {
    position: relative;
    display: none;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 100%;
    transition: -webkit-transform .6s ease;
    transition: transform .6s ease;
    transition: transform .6s ease,-webkit-transform .6s ease;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-perspective: 1000px;
    perspective: 1000px;
}
.carousel-fade .carousel-item {
    opacity: 0;
    -webkit-transition-duration: .6s;
    transition-duration: .6s;
    -webkit-transition-property: opacity;
    transition-property: opacity
}
.carousel-fade .carousel-item-next.carousel-item-left, .carousel-fade .carousel-item-prev.carousel-item-right, .carousel-fade .carousel-item.active {
    opacity: 1
}
.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-right.active {
    opacity: 0
}
.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
    -webkit-transform: translateX(0);
    -ms-transform: translateX(0);
    transform: translateX(0)
}
@supports (transform-style:preserve-3d) {
    .carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
    -webkit-transform:translate3d(0, 0, 0);
    transform:translate3d(0, 0, 0)
    }
}
.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
    -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
}


 
@-webkit-keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInLeft {
  -webkit-animation-name: fadeInLeft;
  animation-name: fadeInLeft;
}

@-webkit-keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}

@-webkit-keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInRight {
  -webkit-animation-name: slideInRight;
  animation-name: slideInRight;
}

 </style>
@endsection

@section('content')
<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="mask flex-center">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-12 order-md-1 order-2">
              <h4>{{getsetting()->site_name}} <br>
               </h4>
              <p>{{getsetting()->slegon}}</p>
                <a href="{{url('/all-products')}}">Achetez maintenant</a> </div>
            <div class="col-md-5 col-12 order-md-2 order-1"><img src="/designe/img/outillage1.png" class="mx-auto" alt="{{getsetting()->site_name}}"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="mask flex-center">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-12 order-md-1 order-2">
              <h4>{{getsetting()->site_name}} <br>
               Site de Vente En ligne</h4>
              <p>Demandez votre produit maintenant</p>
              <a href="{{url('/all-products')}}">Achetez maintenant</a> </div>
            <div class="col-md-5 col-12 order-md-2 order-1"><img src="/designe/img/outillage2.png" class="mx-auto" alt="{{getsetting()->site_name}}"></div>
          </div>
        </div>
      </div>
    </div>
   
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>

     <!--section class="categories" style="margin-bottom: 0px">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach(All_Sous_Category() as $souscategory)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" >
                            <img src="{{asset('/souscategory/'.$souscategory->image)}}" style="height: 180px;">
                            <h5><a href="{{url('/all-product-in-sub-category/'.$souscategory->id.'/'.$souscategory->souscategory)}}">{{$souscategory->souscategory}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section-->
 
  <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Dernier Marques Ajoutées</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tout</li>
                            @foreach(get_Last_marque() as $marque)
                            <li data-filter=".{{$marque->marque}}">{{$marque->marque}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">

                @foreach(All_Product() as $product)
               <div class="col-lg-3 col-md-4 col-sm-6 mix {{$product->marque}}">
                     <div class="card p-3">
                    <div class="text-center">
                     @if(!empty($product->prix_promo))
                        <div class="d-flex sale ">
                            <div class="bb btn">promo</div>
                        </div>
                        @endif
                         <img class="img" src="{{asset('/product/'.$product->image_principale)}}" width="200"> </div>
                    <div class="product-details"> <span class="font-weight-bold d-block">
                         <div class="product__discount__item__text">
                            <span>{{$product->marque}}</span>
                                <h5><a href="{{url('/show-products/'.$product->id.'/'.$product->marque)}}">{{$product->name}}</a></h5>
                                @if(!empty($product->prix_promo))
                                <div class="product__item__price">{{$product->prix_promo}} DA<span>{{$product->prix}} DA</span></div>
                                @else
                                <div class="product__item__price">{{$product->prix}} DA</div>
                                @endif
                                        </div>
                        <div class="buttons d-flex flex-row">
                            <div class="cart1"><button href="#" data-id="{{ $product->id}}" class="heart btn btn-success"><i class="fa fa-heart"></i></button></div> <a href="{{url('/add-to-cart/'.$product->id)}}" class="btn btn-primary cart-button btn-block"><i class="fa fa-shopping-cart"></i> Ajouter au panier </a>
                        </div>
                        <div class="weight"> <small style="color: red">(@if($product->vente == null) 0 @else {{$product->vente}} @endif ventes)</small> </div>
                    </div>
                </div>
                </div>
                
                @endforeach

            </div>
        </div>
    </section>

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6" >
                    <section class="hero">
                    <div class="hero__item set-bg" data-setbg="/designe/img/img1.jpg" style="height: 270px">
                        <div  class="hero__text">
                            <h4 style="margin-bottom: 0px;margin-top: 0px;font-weight: bold; color: white">Nous Proposons Plein De Services De Vente Pour Vous </h4>
                            <a href="{{url('/about')}}" class="btn btn-success">Decouvrez Nos Services</a>
                        </div>
                    </div>
                </section>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                   <section class="hero">
                    <div class="hero__item set-bg" data-setbg="/designe/img/img3.jpg" style="height: 270px">
                        <div  class="hero__text">
                            <h1 style="font-weight: bold;color: #17a2b8;font-family: italic">{{getsetting()->site_name}}</h1>
                            <h4 style="margin-bottom: 0px;margin-top: 0px;font-weight: bold; color: black;color: white">Votre Solution Pour L'achat En Ligne</h4>
                            <a href="{{url('/all-products')}}" class="btn btn-success">Voir Nos Produits</a>
                        </div>
                    </div>
                    
                </section>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Nouveaux Produits</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach(New_Product() as $product)
                                        <a href="{{url('/show-products/'.$product->id.'/'.$product->marque)}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset('/product/'.$product->image_principale)}}" alt="{{$product->name}}" style="width: 95px">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$product->name}}</h6>
                                                <span>{{$product->prix}}</span>
                                            </div>
                                        </a>
                                        @endforeach
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Les plus Produits visites</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach(Favorate_Product() as $product)
                                        <a href="{{url('/show-products/'.$product->id.'/'.$product->marque)}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset('/product/'.$product->image_principale)}}" alt="{{$product->name}}" style="width: 95px">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$product->name}}</h6>
                                                <span>{{$product->prix}}</span>
                                                <span style="color: red;font-size: 12px">({{$product->view}} vues)</span>
                                            </div>
                                        </a>
                                        @endforeach
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Les plus Produits ventes</h4>
                        <div class="latest-product__slider owl-carousel">
                           
                            <div class="latest-prdouct__slider__item">
                                @foreach(Favorate_Product_Vente() as $product)
                                        <a href="{{url('/show-products/'.$product->id.'/'.$product->marque)}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset('/product/'.$product->image_principale)}}" alt="{{$product->name}}" style="width: 95px">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$product->name}}</h6>
                                                <span>{{$product->prix}}</span>
                                                <span style="color: red;font-size: 12px">({{$product->vente}} ventes)</span>
                                            </div>
                                        </a>
                                        @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <!--section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="/designe/img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="/designe/img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="/designe/img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section-->
@endsection

@section('footer')
<script type="text/javascript">
     $('#myCarousel').carousel({
    interval: 4000,
 })
</script>
   <script type="text/javascript">
$('.heart').click(function(){
 $.ajax({
   url: "/update_heart_count",
   type:"get",
   data: {
     id:   $(this).attr('data-id')
   },
   success: function (data) {
     console.log(data);
   },
   error: function (request, status, error) {
     console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
   }
 });
});
</script>
@endsection