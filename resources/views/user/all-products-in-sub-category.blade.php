@extends('layouts.app')

@section('title')
 TOUT LES PRODUITS
@endsection

@section('header')
 <style type="text/css">
 	.uppercase{
 		text-transform: uppercase;
 	}
 	.remise a:hover{
        color: green;
 	}
 </style>
@endsection

@section('content')
 <section class="breadcrumb-section set-bg" data-setbg="/designe/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Tous les produits de {{$subcatname}}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/home')}}">ACCUEIL</a>
                            <span>Produits</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section class="product spad" style="margin-bottom: 40px;margin-top: 40px">
        <div class="container">
                        @include('layouts.flash-msg')

            <div class="row">
                <div class="col-lg-3 col-md-4" style="border-right: 1px solid black">
                    <div class="sidebar">
                         <div class="sidebar__item">
                            <h4>RECHERCHE</h4>
                            <form method="get" action="{{'/search-products'}}">
                                <input type="text" name="product" class="form-control form-control-lg" placeholder="produit">
                                <button class="btn btn-primary">Rechercher</button>
                            </form>
                        </div>
                        <div class="sidebar__item">
                            <h4>Catégories</h4>
                            <ul>
                                <li><a href="{{url('/all-products')}}">Tout</a></li>
                                @foreach(All_Category() as $category)
                                <li><a href="{{url('/all-products/'.$category->id.'/'.$category->category)}}">{{$category->category}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!--div class="sidebar__item">
                            <h4>PRIX</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="{{$min_prix}}" data-max="{{$max_prix}}">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div-->
                       
                        <div class="sidebar__item">
                            <h4>MARQUES</h4>
                            @foreach(All_Marque() as $marque)
                            <div class="sidebar__item__size">
                                <label for="large">
                                    
                                    <a class="btn" id="large" href="{{url('/all-product/marque/'.$marque->marque)}}"> {{$marque->marque}}</a>
                                </label>
                            </div>
                            @endforeach
                           
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4 style="color: blue">Nouveaux Produits</h4>
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
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                    
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>AFFICHER PAR</span>
                                    <select>
                                        <option value="{{url('/all-products/9')}}">9 produits</option>
                                        <option value="{{url('/all-products/12')}}">12 produits</option>
                                        <option value="{{url('/all-products/15')}}">15 produits</option>
                                        <option value="{{url('/all-products/18')}}">18 produits</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{count($products)}}</span> Produit existe</h6>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                        @if(count($products) == 0)
                   
                        
                          <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            <div class="product__item">
                               <h4 style="color: red">LA LISTE DES PRODUITS EST VIDE</h4>
                            </div>
                        </div>
                        @else
                         <div class="row">
                        @foreach($products as $product)
                       <div class="col-lg-4 col-md-4 col-sm-6 mix {{$product->marque}}">
                     <div class="card p-3">
                    <div class="text-center">
                     @if(!empty($product->prix_promo))
                        <div class="d-flex sale ">
                            <div class="bb btn">promo</div>
                        </div>
                        @endif
                         <img src="{{asset('/product/'.$product->image_principale)}}" width="200"> </div>
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

                       {{$products->links()}}
                      @endif
                </div>
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