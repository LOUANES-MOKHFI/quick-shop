@extends('layouts.app')

@section('title')
 PANIER
@endsection

@section('header')
 
@endsection
@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="/designe/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>PANIER</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/home')}}">ACCUEIL</a>
                            <span>PANIER</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      <section class="shoping-cart spad">
        <div class="container">
        	@include('layouts.flash-msg')
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Produits</th>
                                    <th>Prix</th>
                                    <th>Quantitie</th>
                                    <th></th>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@if(count($products) == 0)
                            	<tr>
                            		<td colspan="4" style="color: red;font-size: 20px;font-weight: bold"> LE PANIER EST VIDE</td>
                            	</tr>
                            	@else
                                @foreach($products as $product )
                                
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset('/product/'.getProduct_byid($product->id)->image_principale)}}" alt="" style="height: 60px">
                                        <h5>{{$product->name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{$product->price}}
                                    </td>
                                    <form action="{{url('/update-product-in-cart')}}" method="post">
                                        @csrf
                                     <td class="shoping__cart__quantity">
                                         <input type="hidden" name="id" value="{{$product->rowId}}">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$product->qty}}" name="qte">
                                            </div>
                                        </div>
                                    </td>
                                        <td class="shoping__cart__item__close">
                                        <span><button class="btn fa fa-spinner" style="color: red"></button></span>
                                    </td>
                                    </form>
                                   
                                    <td class="shoping__cart__total">
                                         {{$product->price * $product->qty}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span><a href="{{url('/remove-from-cart/'.$product->rowId)}}" class="fa fa-remove" style="color: red;font-size: 28px"></a></span>
                                    </td>
                                    
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{url('all-products')}}" class="primary-btn cart-btn">CONTINUE LE SHOPPING</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!--div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div-->
                </div>
                @if(count($products) > 0)
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>PRIX TOTAL</h5>
                        <ul>
                            <li>Total <span>{{Cart::subtotal() }} DA</span></li>
                        </ul>
                        @if(Auth::check())
                        <a href="{{url('/checkout')}}" class="btn btn-primary pri">COMMANDER</a>
                        @else
                        <a onclick="document.getElementById('not_auth').style.display='block'" href="#"class="btn btn-primary pri">COMMANDER</a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

      @include('layouts.layout_auth')

@endsection

@section('footer')
 
@endsection