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
              <h3 class="card-title col-md-4">Liste des produits Non Confirmer</h3>
            
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
                  <th width="150">PAYS DE PRODUCTION</th>
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
                    <a class="btn btn-success" href="{{'/admin/product-not-confirmed/'.$product->id.'/confirmer'}}">Confirmer</a>
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
                  <th width="150">PAYS DE PRODUCTION</th>
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