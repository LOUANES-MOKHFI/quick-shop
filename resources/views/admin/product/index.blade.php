@extends('admin.layouts.app')
@section('title')
      produits
@endsection

@section('header')

@endsection
@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-5">
            <h1 class="m-0 text-dark">Liste des produits Confirmer</h1>
          </div><!-- /.col -->
          <div class="col-md-4 col-sm-4">
                <a href="{{url('/admin/product-not-confirmed')}}" class="btn btn-danger float-right"></i>produit non confirmer</a>
             </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/product')}}">Liste des produits Confirmer</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    </div>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
             <div class="card-header row">
              <h3 class="card-title col-md-2">Liste des produits Confirmer</h3>
              <form class="card card-sm col-md-7" action="{{url('/admin/search_product')}}" method="get">
        {{ csrf_field()}}
         <div class=" row no-gutters align-items-center">
             <div class="col-md-10 col-sm-12">
                 <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="produit ,marque ,pays de production, .." name="product">
             </div>
                                    <!--end of col-->
            <div class="col-md-2 col-sm-12">
                 <button class="btn btn-lg btn-info" type="submit" name="search">Rechercher</button>
             </div>
                                    <!--end of col-->
         </div>
     </form>
             <div class="col-md-3 col-sm-12">
                <a href="{{url('/admin/product/create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>Ajouter un produit</a>
             </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>PHOTO</th>
                  <th width="150">NOM DE PRODUIT</th>
                  <th width="150">MARQUE</th>
                  <th width="150">CATEGORIE</th>
                  <th width="100">ACTION</th>
                </tr>
                </thead>
                <tbody>
                	@if(count($products) == 0)
                        <tr>
                        	<td colspan="5" style="color: red;font-weight: bold" align="center">LA LISTE DES PRODUITS EST VIDE</td>
                        </tr>
                	@else
                  @foreach($products as $product)
                  
                <tr>
                    <td width="120"><img style="height: 100px;width: 120px" src="{{asset('/product/'.$product->image_principale)}}"></td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->mainCategory->category}}</td>
                  <td>{{$product->pays_production}}</td>
                  <td>
                    <a class="btn btn-info fa  fa-eye-slash" href="{{'/admin/product/'.$product->id}}"></a>
                    <a class="btn btn-warning fa fa-btn fa-edit" href="{{'/admin/product/'.$product->id.'/edit'}}"></a>
                        {{ csrf_field()}}
                        {{ method_field('DELETE') }}
                        <a class="btn btn-danger far fa-trash-alt" href="{{'/admin/product/'.$product->id.'/delete'}}"></a>
                  </td>
                </tr>
          
                 @endforeach
                 @endif
                </tbody>
                <tfoot>
                   <tr>
                  <th>PHOTO</th>
                  <th width="150">NOM DE PRODUIT</th>
                  <th width="150">MARQUE</th>
                  <th width="150">CATEGORIE</th>
                  <th width="100">ACTION</th>
                </tr>
                </tfoot>
              </table>
            </div>
            {{$products->links()}}
          </div>
        </div>
      </div>
    </section>
@endsection
@section('footer')

@endsection