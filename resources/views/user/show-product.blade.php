@extends('layouts.app')

@section('title')
 DETAILS DE PRODUIT
@endsection

@section('header')
 
@endsection

@section('content')
 <section class="breadcrumb-section set-bg" data-setbg="/designe/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$product->name}}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/home')}}">ACCUEIL</a>
                            <a href="{{url('/all-product/marque/'.$product->mainCategory->category)}}">{{$product->mainCategory->category}}</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
                        @include('layouts.flash-msg')

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{asset('/product/'.$product->image_principale)}}" alt="{{$product->name}}">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{asset('/product/'.$product->image1)}}"
                                src="{{asset('/product/'.$product->image1)}}" alt="{{$product->name}}">
                            <img data-imgbigurl="{{asset('/product/'.$product->image2)}}"
                                src="{{asset('/product/'.$product->image2)}}" alt="{{$product->name}}">
                            <img data-imgbigurl="{{asset('/product/'.$product->image3)}}"
                                src="{{asset('/product/'.$product->image3)}}" >
                            <img data-imgbigurl="{{asset('/product/'.$product->image4)}}"
                                src="{{asset('/product/'.$product->image4)}}" alt="{{$product->name}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>({{$product->view}} vues)</span>
                        </div>
                          @if(!empty($product->prix_promo))
                           <div class="product__discount__item__text">
								<div class="product__item__price text-left product__details__price">{{$product->prix_promo}} DA<span style="font-size: 25px">{{$product->prix}} DA</span></div>
                                        </div>
                        @else
                        <div class="product__details__price">{{$product->prix}} DA</div>
                        @endif
                        <p>{{$product->description}}.</p>
                        <div class="row">
                            <div class="col-md-6">

                            <form method="post" action="{{url('/add-to_cart')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="poids" value="{{$product->poids}}">

                             @if(!empty($product->prix_promo))
                               <input type="hidden" name="prix" value="{{$product->prix_promo}}">
                             @else
                         <input type="hidden" name="prix" value="{{$product->prix}}">
                             @endif
                                    <select name="qte" class="form-conrtol">
                                        @for($i=1;$i<21;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                        <button class="btn btn-primary"><i class="fa fa-cart-plus"></i> Ajouter au panier</button>
                         </form>
                            </div>
                            <div class="col-md-2">
                                 <button type="button" data-id="{{ $product->id}}" class="heart btn btn-primary"><i class="fa fa-heart-o"></i></button>
                            </div>
                        </div>
                        
                       
                        <ul>
                            <li><b>DISPONIBILITE</b> <span>@if($product->qte == 0) En Réapprovisionnement @else En Stock @endif</span></li>
                            <li><b>Marque</b> <span>{{$product->marque}}.</span></li>
                            <li><b>Designation</b> <span>{{$product->designation}}</span></li>
                            <li><b>Pays de production</b> <span>{{$product->pays_production}}</span></li>
                            <li><b>Référence</b> <span>{{$product->reference}}</span></li>
                            <li><b>Poids</b> <span>{{$product->poids}} KG</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Produit dans la meme marque</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            	@if(count(getProduct_Marque($product->marque))==0)
    			 <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="text-center">
                    	<h4 style="color: red;">AUCUN PRODUIT EXISTE DANS LA MEME MARQUE</h4>
                    </div>
                </div>
            	@else
               @foreach(getProduct_Marque($product->marque) as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('/product/'.$product->image_principale)}}">
                            <ul class="product__item__pic__hover">
                                <li><button href="#" data-id="{{ $product->id}}" class="heart btn btn-success"><i class="fa fa-heart"></i></button></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$product->name}}</a></h6>
                            <h5>{{$product->prix}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection

@section('footer')
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