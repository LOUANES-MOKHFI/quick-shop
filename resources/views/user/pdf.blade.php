<!DOCTYPE html>
<html>
<head>
	<title>DEVIS</title>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
<style type="text/css">
    body {
    background-color: white
}

.padding {
    padding: 2rem !important
}

.card {
    margin-bottom: 30px;
    border: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e6e6f2
}

h3 {
    font-size: 20px
}

h5 {
    font-size: 15px;
    line-height: 26px;
    color: #3d405c;
    margin: 0px 0px 15px 0px;
    font-family: 'Circular Std Medium'
}

.text-dark {
    color: #3d405c !important
}
</style>
</head>
<body>
     <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
     <div class="card">
         <div class="card-header p-4">
             <a class="pt-2 d-inline-block" href="" data-abc="true">{{getsetting()->site_name}}</a>
             <div class="float-right">
                 <h3 class="mb-0"></h3>
                 {{$date_commande}}
             </div>
         </div>
         <div class="card-body">
             <div class="row mb-4">
                 <div class="col-sm-6 col-lg-6">
                     <h5 class="mb-3">de:</h5>
                     <h3 class="text-dark mb-1">{{getsetting()->site_name}}</h3>
                     <div>{{getsetting()->adress}}</div>
                     <div>Email: {{getsetting()->site_email}}</div>
                     <div>{{getsetting()->site_phone}}</div>
                 </div>
                 <div class="col-sm-6  col-lg-6">
                     <h5 class="mb-3">à:</h5>
                     <h3 class="text-dark mb-1">{{$fname}}-{{$lname}}</h3>
                     <div>{{$wilaya}}</div>
                     <div>{{$commune}}-{{$adress}}</div>
                     <div>Email:{{$email}}</div>
                     <div>{{$num_tlfn}}</div>
                 </div>
             </div>
             <div class="table-responsive-sm">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                                <th>Produit</th>
                                <th>Quantities</th>
                                <th>Prix Unitaire</th>
                                <th>Prix total</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach(Cart::content() as $commande)
                          <tr>
                             <td class="left strong">{{getProduit_commande($commande->id)->name}}</td>
                             <td class="left">{{$commande->qty}}</td>
                             <td class="right">{{$commande->price}} DA</td>
                             <td class="center">{{$commande->qty * $commande->price}} DA</td>
                          </tr>
                        @endforeach
                         
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-lg-4 col-sm-5">
                 </div>
                 <div class="col-lg-4 col-sm-5 ml-auto">
                     <table class="table table-clear">
                         <tbody>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">PRIX DES PRODUIT</strong>
                                 </td>
                                 <td class="right">{{Cart::subtotal()}} DA</td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">PRIX DE LIVRAISON</strong>
                                 </td>
                                 <td class="right">{{$prix_livraison}} DA</td>
                             </tr>
                             
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">PRIX Total</strong> </td>
                                 <td class="right">
                                     <strong class="text-dark">{{Cart::subtotal()}} DA</strong>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <div class="card-footer bg-white">
             <p class="mb-0">{{getsetting()->site_name}},{{getsetting()->adress}}</p>
         </div>
     </div>
 </div>


</body>
</html>