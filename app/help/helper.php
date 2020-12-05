<?php 

function getsetting(){
     return \App\SiteSetting::where('id', 1)->first();
}
function All_Wilaya(){
  return \App\Wilaya::where('deleted',0)->where('active',1)->orderBy('wilaya')->get();
}
function countunreadCommande(){
  return \App\Commande::count();
}
function unreadCommande(){
  return \App\Client::where('effectuer',0)->get();
}

function All_Commande(){
  return \App\Client::where('effectuer',0)->paginate(15);
}

function getCommande_Client($id){
return \App\Commande::where('id_client',$id)->first();
}



function All_commande_by_oneClient($id){
  return \App\Commande::where('id_client',$id)->get();
}

function getPrice($wilaya){
  return \App\Wilaya::where('wilaya',$wilaya)->first();
}



function getAll_Product_byId($id){
  return \App\Product::where('id',$id)->get();
}

function get_Last_marque(){
  return \App\Product::select('marque')->distinct()->where('deleted',0)->where('confirmation_admin',1)->limit(4)->get();
}
function unreadMessage(){
    return \App\Contact::where('view' , 0)->where('deleted',0)->get();
  }

  function countunreadMessage(){
    return \App\Contact::where('view' , 0)->where('deleted',0)->count();
  }
    function countreadMessage(){
    return \App\Contact::where('view' , 1)->where('deleted',0)->count();
  }
     function deleted_message(){
    return \App\Contact::where('view' , 1)->where('deleted',1)->get();
  }
   function allmessage(){
     return \App\Contact::where('deleted',0)->get();
   }
function getCategory($id){
  return \App\Category::where('id',$id)->where('deleted',0)->first();
}
function All_Category(){
  return \App\Category::where('deleted',0)->get();
}
function All_Sous_Category(){
  return \App\SousCategory::where('deleted',0)->get();
}
function Last_Category(){
  return \App\Category::where('deleted',0)->limit(4)->get();
}
function getProduct_Category($id){
  return \App\Category::where('id',$id)->where('deleted',0)->first();
}
function getProduct_Sous_Category($id){
  return \App\SousCategory::where('id',$id)->where('deleted',0)->first();
}

function New_Product(){
  return \App\Product::where('deleted',0)->where('confirmation_admin',1)->limit(4)->get();
}
function New_Product_promo(){
  return \App\Product::where('deleted',0)->where('confirmation_admin',1)->where('prix_promo','!=',null)->limit(4)->get();
}
function All_Marque(){
  return \App\Product::select('marque')->distinct()->where('deleted',0)->where('confirmation_admin',1)->get();
}
function getProduct_Marque($marque){
  return \App\Product::where('deleted',0)->where('confirmation_admin',1)->where('marque',$marque)->where('prix_promo',null)->limit(4)->get();
}
function Favorate_Product(){
  return \App\Product::where('deleted',0)->where('confirmation_admin',1)->where('view','>',40)->limit(3)->get();
}
function Favorate_Product_Vente(){
  return \App\Product::where('deleted',0)->where('confirmation_admin',1)->where('vente','>',15)->limit(3)->get();
}

function getProduct_byid($id){
  return \App\Product::find($id);
}
function getProduit_commande($id){
  return \App\Product::where('id',$id)->first();
}
function All_Client(){
  return \App\Client::all();
}
function All_Product(){
  return \App\Product::where('deleted',0)->where('confirmation_admin',1)->get();
}
function gettotalprice($id_client){
   return \App\Commande::where('id_client',$id_client)->groupBy('id')->sum('prix_total');
}

?>