@extends('admin.layouts.app')
@section('title')
      Afficher une commande
@endsection

@section('header')
      {!! Html::style('/designe/assets/css/font-awesome.css')!!}

    {!! Html::style('/designe/assets/css/style.css')!!}


<style type="text/css">
  .uppercase{
    text-transform: uppercase;
    font-size: 25px;
    font-weight: bold;
    color: red;
  }
 
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 0;
}
.card {
    margin-bottom: 30px;
}
.card-body {
    flex: 1 1 auto;
    padding: 1.57rem;
}

 .note-has-grid .nav-link {
     padding: .5rem
 }

 .note-has-grid .single-note-item .card {
     border-radius: 10px
 }

 .note-has-grid .single-note-item .favourite-note {
     cursor: pointer
 }

 .note-has-grid .single-note-item .side-stick {
     position: absolute;
     width: 3px;
     height: 35px;
     left: 0;
     background-color: rgba(82, 95, 127, .5)
 }

 .note-has-grid .single-note-item .category-dropdown.dropdown-toggle:after {
     display: none
 }

 .note-has-grid .single-note-item .category [class*=category-] {
     height: 15px;
     width: 15px;
     display: none
 }

 .note-has-grid .single-note-item .category [class*=category-]::after {
     content: "\f0d7";
     font: normal normal normal 14px/1 FontAwesome;
     font-size: 12px;
     color: #fff;
     position: absolute
 }

 .note-has-grid .single-note-item .category .category-business {
     background-color: rgba(44, 208, 126, .5);
     border: 2px solid #2cd07e
 }

 .note-has-grid .single-note-item .category .category-social {
     background-color: rgba(44, 171, 227, .5);
     border: 2px solid #2cabe3
 }

 .note-has-grid .single-note-item .category .category-important {
     background-color: rgba(255, 80, 80, .5);
     border: 2px solid #ff5050
 }

 .note-has-grid .single-note-item.all-category .point {
     color: rgba(82, 95, 127, .5)
 }

 .note-has-grid .single-note-item.note-business .point {
     color: rgba(44, 208, 126, .5)
 }

 .note-has-grid .single-note-item.note-business .side-stick {
     background-color: rgba(44, 208, 126, .5)
 }

 .note-has-grid .single-note-item.note-business .category .category-business {
     display: inline-block
 }

 .note-has-grid .single-note-item.note-favourite .favourite-note {
     color: #ffc107
 }

 .note-has-grid .single-note-item.note-social .point {
     color: rgba(44, 171, 227, .5)
 }

 .note-has-grid .single-note-item.note-social .side-stick {
     background-color: rgba(44, 171, 227, .5)
 }

 .note-has-grid .single-note-item.note-social .category .category-social {
     display: inline-block
 }

 .note-has-grid .single-note-item.note-important .point {
     color: rgba(255, 80, 80, .5)
 }

 .note-has-grid .single-note-item.note-important .side-stick {
     background-color: rgba(255, 80, 80, .5)
 }

 .note-has-grid .single-note-item.note-important .category .category-important {
     display: inline-block
 }

 .note-has-grid .single-note-item.all-category .more-options,
 .note-has-grid .single-note-item.all-category.note-favourite .more-options {
     display: block
 }

 .note-has-grid .single-note-item.all-category.note-business .more-options,
 .note-has-grid .single-note-item.all-category.note-favourite.note-business .more-options,
 .note-has-grid .single-note-item.all-category.note-favourite.note-important .more-options,
 .note-has-grid .single-note-item.all-category.note-favourite.note-social .more-options,
 .note-has-grid .single-note-item.all-category.note-important .more-options,
 .note-has-grid .single-note-item.all-category.note-social .more-options {
     display: none
 }

 @media (max-width:767.98px) {
     .note-has-grid .single-note-item {
         max-width: 100%
     }
 }

 @media (max-width:991.98px) {
     .note-has-grid .single-note-item {
         max-width: 100%
     }
 }
</style>



@endsection
@section('content')
 <div class="content-header" style="margin-top: 0px;padding: 0px 0px ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">AFFICHE UNE COMMANDE</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/commande')}}">Liste des commandes</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    </div>
      
    
    <section class="content" >
      <div class="row">
        <div class="col-12">
          <div class="card">
       <section id="car-list-area" class="section-padding" style="margin-top: 0px;padding: 0px 0px ">
        <div class="container">
            <div class="row">
              <div class="col-lg-5">
                  <div class="page-content container note-has-grid">
   
    <div class="tab-content bg-transparent">
        <div id="note-full-container" class="note-has-grid">
            <div class=" single-note-item all-category" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" > </h5>
                    <div class="sidebar-body">
                        <p style="color: red;font-size: 20px"><i class=""></i>PRIX TOTAL : {{getCommande_Client($client->id)->prix_total}} DA</p>
                        <p style="color: red;font-size: 20px"><i class=""></i> WILAYA DE LIVRAISON : {{getCommande_Client($client->id)->wilaya_livraison}}</p>
                         <p style="color: red;font-size: 20px"><i class=""></i> PRIX DE LIVRAISON : {{getPrice(getCommande_Client($client->id)->wilaya_livraison)->prix}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
              </div>
                <div class="col-lg-7">
                <div class="col-lg-12 col-sm-12">
<div class="page-content container note-has-grid">
   
    <div class="tab-content bg-transparent">
        <div id="note-full-container" class="note-has-grid">
            <div class=" single-note-item all-category" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" >Informations de client </h5>
                     <div class="sidebar-body">
                        <p><i class="fa fa-address-card-o"></i> {{$client->fname}} {{$client->lname}}</p>
                        <p><i class="fa fa-mobile"></i>  {{$client->num_tlfn}}</p>
                         <p><i class="fa fa-envelope"></i>   {{$client->email}}</p>
                      </div>
                </div>
            </div>
        </div>
    </div>   
</div>

<div>
    <a class="btn btn-success" href="{{'/admin/valider-commande/'.$client->id.'/effectuer'}}">EFFECTUER</a>
</div>
                

                </div>

            </div>
            
        </div>

    </section>
  </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                 
                <tr>
                  <th width="150">PRODUIT</th>
                  <th width="150">MARQUE</th>
                  <th width="150">PRIX</th>
                  <th width="150">QUANTITIES</th>
                  <th width="150">PRIX UNITAIRE</th>

                </tr>
                </thead>
                <tbody>
                   
                  @foreach(All_commande_by_oneClient($client->id) as $commande)
                  
                <tr>
                  <td>{{getProduit_commande($commande->id_product)->name}}</td>
                  <td>{{getProduit_commande($commande->id_product)->marque}}</td>
                  <td>{{$commande->prix}}</td>
                  <td>{{$commande->qte}}</td>
                  <td>{{$commande->prix * $commande->qte}}</td>
                  
                </tr>
          
                 @endforeach
                 
                </tbody>
                <tfoot>
                  <tr>
                  <th width="150">PRODUIT</th>
                  <th width="150">MARQUE</th>
                  <th width="150">PRIX</th>
                  <th width="150">QUANTITIES</th>
                  <th width="150">PRIX UNITAIRE</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('footer')

@endsection