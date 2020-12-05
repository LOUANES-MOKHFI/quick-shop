@extends('admin.layouts.app')
@section('title')
      Sous Catégorie
@endsection

@section('header')

@endsection
@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des Sous categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/sous-category')}}">Liste des Sous categories</a></li>
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
              <h3 class="card-title col-md-6">Afficher la sous categorie <span style="color: red;font-size: 20px"> {{$souscategory->souscategory}}</span></h3>
            </div>

          <div class="card-body">
             <div class="row">
              <div class="form-group col-md-6">  
                  <h2>Sous Categorie: <span style="color: red;"> {{$souscategory->souscategory}}</span></h2>
                  <h4>Categorie: <span style="color: red">{{$souscategory->mainCategory->category}}</span></h4>
            
              </div>
              <div class="form-group col-md-6">  
                <img  src="{{asset('/souscategory/'.$souscategory->image)}}" class="zoom img-fluid "  alt="">
              </div>
            </div>
          </div>
           
         
          </div>
        </div>
      </div>
    </section>
@endsection
@section('footer')

@endsection