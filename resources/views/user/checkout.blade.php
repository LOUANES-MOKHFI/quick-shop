@extends('layouts.app')

@section('title')
 PASSER LA COMMANDE
@endsection

@section('header')
 <style type="text/css">
 	.checkout__input select{
     width: 200%;
 	}
 </style>
@endsection

@section('content')
 <section class="breadcrumb-section set-bg" data-setbg="/designe/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>VALIDER LA COMMANDE</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/home')}}">ACCUEIL</a>
                            <span>COMMANDE</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            @include('layouts.flash-msg')
            <div class="checkout__form">
                <h4>Détails de facturation</h4>
                <form action="{{url('/checkout')}}" method="post">
                	@csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>NOM <span>*</span></p>
                                        <input type="text" name="fname" value="{{old('fname')}}" class="@error('fname') is-invalid @enderror">
                                         @error('fname')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>PRENOM<span>*</span></p>
                                       <input type="text" name="lname" value="{{old('lname')}}" class="@error('lname') is-invalid @enderror">
                                        @error('lname')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="checkout__input" style="width: 100px">
                                <p>WILAYA<span>*</span></p>

                                <select name="wilaya" class="checkout__input__add @error('wilaya') is-invalid @enderror" id="wilaya">
                                    <option value="">-- wilaya --</option>
                                    @foreach(All_Wilaya() as $wilaya)
                                      <option value="{{$wilaya->wilaya}}">{{$wilaya->wilaya}}</option>
                                    @endforeach
                                </select>
                                  </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="checkout__input">
                                    <p>Commune<span>*</span></p>
                                    <input type="text" name="commune" value="{{old('commune')}}" class="@error('commune') is-invalid @enderror">
                                     @error('commune')
                                     <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Adress<span>*</span></p>
                                <input type="text" placeholder="Adress Personnelle" class="checkout__input__add" name="adress" value="{{old('adress')}}">
                                 @error('adress')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                            
                            <div class="checkout__input">
                                <p>Code Postal <span>*</span></p>
                                <input type="text" name="code_postale" value="{{old('code_postale')}}" class="@error('code_postale') is-invalid @enderror">
                                 @error('code_postale')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Numéro de télèphone<span>*</span></p>
                                        <input type="text" name="num_tlfn" value="{{old('num_tlfn')}}" class="@error('num_tlfn') is-invalid @enderror">
                                         @error('num_tlfn')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                       <input type="email" name="email" value="{{old('email')}}" class="@error('email') is-invalid @enderror">
                                        @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                                    </div>
                                </div>
                            </div>
                           
                            <div class="checkout__input">
                                <p>Notes de commande (facultatif)</p>
                                <input type="text"
                                    placeholder="Commantaires concernant votre commande, ex: consignes de livraison." name="commentaire">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Votre Commande</h4>
                                <div class="checkout__order__products">Products <span>Quantites</span><span>Prix*</span></div>
                                <ul>
                                	@foreach(Cart::content() as $product)
                                    <li>{{$product->name}} 
                                    	<span>{{$product->qty}}</span>
                                    	<span>{{$product->price}}*</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Prix des produits <span>{{Cart::subtotal()}} DA</span></div>
                                <div class="checkout__order__subtotal" id="price"></div>
                                <div class="checkout__order__total">Total <span>{{Cart::subtotal()}} DA</span></div>
                               
                                <p>Vos données personnelles seront utilisées pour le traitement de votre commande, vous accompagner au cours de votre visite du site web.</p>

                                <button type="submit" class="site-btn">Commander</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('footer')


<script type="text/javascript">
   $('#wilaya').on('change',function(e){
                console.log(e);
                var wilaya = e.target.value;

                //ajax
                $.get('/ajax-wilaya?wilaya=' + wilaya,function(data){
                    $('#price').empty();
                   $.each(data, function(checkout,wilaya){
                    var para = document.createElement("H4");
                    var price = wilaya.prix;
                    var t = document.createTextNode("PRIX DE LIVRAISON : " + price + " DA ");
                    //alert(t);
                    para.appendChild(t);  
                    document.getElementById("price").appendChild(para);
                    document.getElementById("price1").appendChild(price);
                      //$('#price').append('<span>'+wilaya.prix+'</span>');
                   });
                });
              });
</script>
@endsection