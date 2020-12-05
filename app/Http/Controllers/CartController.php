<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
class CartController extends Controller
{
    public function add(Request $request,$id){
    	$product = Product::find($id);
    	if(!empty($product->prix_promo)){
 		 $add = Cart::add([
              'id' => $product->id,
               'name' => $product->name,
               'price' => $product->prix_promo,
               'weight' => $product->poids,
               'qty' => 1,
                  ]);
    	}else{
         $add = Cart::add([
              'id' => $product->id,
               'name' => $product->name,
               'price' => $product->prix,
               'weight' => $product->poids,
               'qty' => 1,

         ]);
       }
         return redirect()->back()->with('success','le produit est ajouter au panier');
         
    }
     public function addCart(Request $request){
         $add = Cart::add([
              'id' => $request->id,
               'name' => $request->name,
               'price' => $request->prix,
               'weight' => $request->poids,
               'qty' => $request->qte,
         ]);
       
         return redirect()->back()->with('success','le produit est ajouter au panier');
         
    }
    public function cart(){
    	$products = Cart::Content();
    	
    	return view('user.cart',compact('products'));
    }

    public function remove($id){
        $cart = Cart::remove($id);
    	//$cart = Cart::removed($id);
    	//dd($cart);
    	return redirect()->back()->with('success','Le produit est supprimer de panier');
    }

     public function update(Request $request){
        $cart = Cart::update($request->id,$request->qte);
    	//$cart = Cart::removed($id);
    	//dd($cart);
    	return redirect()->back()->with('success','Le produit est Modifer dans panier');
    }
   
}
