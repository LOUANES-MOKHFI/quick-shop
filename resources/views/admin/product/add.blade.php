@extends('admin.layouts.app')
@section('title')
      produit
@endsection

@section('header')
<style type="text/css">
  label{
    color:blue;
  }
</style>
@endsection
@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">AJOUTER UN PRODUIT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/product')}}">Liste des produit</a></li>
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
              <h3 class="card-title col-md-12">AJOUTER UN PRODUIT</h3>
             </div>
           {!!Form::open(['url' => '/admin/product' ,'method' => 'post','enctype'=>'multipart/form-data'])!!}
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="name">NOM DE PRODUIT</label>
                      <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>

                    <div class="col-md-4 form-group">
                      <label for="marque">MARQUE DE PRODUIT</label>
                      <input id="marque" type="text" class="form-control form-control-lg @error('marque') is-invalid @enderror" name="marque" value="{{ old('marque') }}" required autocomplete="marque" autofocus>

                          @error('marque')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="designation">DESIGNATION DE PRODUIT</label>
                      <input id="designation" type="text" class="form-control form-control-lg @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" autofocus>

                          @error('designation')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                     <div class="col-md-3 form-group">
                      <label for="reference">REFERENCE DE PRODUIT</label>
                      <input id="reference" type="text" class="form-control form-control-lg @error('reference') is-invalid @enderror" name="reference" value="{{ old('reference') }}" required autocomplete="reference" autofocus>

                          @error('reference')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-3 form-group">
                      <label for="pays_production">PAYS DE PRODUCTION</label>
                      <input id="pays_production" type="text" class="form-control form-control-lg @error('pays_production') is-invalid @enderror" name="pays_production" value="{{ old('pays_production') }}" required autocomplete="pays_production" autofocus>

                          @error('pays_production')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-3 form-group">
                      <label for="poids">POIDS EN KG</label>
                      <input id="poids" type="text" class="form-control form-control-lg @error('poids') is-invalid @enderror" name="poids" value="{{ old('poids') }}" required autocomplete="poids" autofocus>

                          @error('poids')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                   <div class="col-md-3 form-group">
                      <label for="qte">QUANTITIE DANS LE STOCKE</label>
                     <input id="qte" type="number" class="form-control form-control-lg @error('qte') is-invalid @enderror" name="qte" value="{{ old('qte') }}" required autocomplete="qte" autofocus>
                      @error('qte')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                      @enderror
                    </div>
                    <div class="col-md-3 form-group">
                      <label for="id_category">CATEGORIE</label>
                      <select name="id_category" class="form-control-lg form-control @error('id_category') is-invalid @enderror">
                        <option value="">-- CATEGORIE --</option>
                        @foreach(All_Category() as $category)
                          <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                      </select>
                      @error('id_category')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                      @enderror
                    </div>
                      <div class="col-md-3 form-group">
                      <label for="id_souscategory">SOUS CATEGORIE</label>
                      <select name="id_souscategory" class="form-control-lg form-control @error('id_souscategory') is-invalid @enderror">
                        <option value="">-- CATEGORIE --</option>
                        @foreach(All_Sous_Category() as $souscategory)
                          <option value="{{$souscategory->id}}">{{$souscategory->souscategory}}</option>
                        @endforeach
                      </select>
                      @error('id_souscategory')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                      @enderror
                    </div>
                    <div class="col-md-3 form-group">
                      <label for="prix"> PRIX EN DA </label>
                        <input id="prix" type="text" class="form-control form-control-lg @error('prix') is-invalid @enderror" name="prix" required autocomplete="prix"  value="{{ old('prix') }}">

                        @error('prix')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                           
                    </div>
                      <div class="col-md-3 form-group">
                      <label for="prix_promo">PRIX PROMO EN DA</label>
                       <input id="prix_promo" type="number" class="form-control form-control-lg @error('prix_promo') is-invalid @enderror" name="prix_promo" required autocomplete="prix_promo">
                      @error('prix_promo')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                      @enderror
                    </div>
                   
                   
                   
                   
                      <div class="col-md-3 form-group">
                      <label for="image_principale">IMAGE PRINCIPALE</label>
                      <input id="image_principale" type="file" class="form-control form-control-lg @error('image_principale') is-invalid @enderror" name="image_principale" required autofocus>

                          @error('image_principale')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-3 form-group">
                      <label for="image1">IMAGE 1</label>
                      <input id="image1" type="file" class="form-control form-control-lg @error('image1') is-invalid @enderror" name="image1" required autofocus>

                          @error('image1')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-3 form-group">
                      <label for="image2">IMAGE 2</label>
                      <input id="image2" type="file" class="form-control form-control-lg @error('image2') is-invalid @enderror" name="image2" required autofocus>

                          @error('image2')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-3 form-group">
                      <label for="image3">IMAGE 3</label>
                      <input id="image3" type="file" class="form-control form-control-lg @error('image3') is-invalid @enderror" name="image3" required autofocus>
                          @error('image3')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                     <div class="col-md-3 form-group">
                      <label for="image4">IMAGE 4</label>
                      <input id="image4" type="file" class="form-control form-control-lg @error('image3') is-invalid @enderror" name="image4" required autofocus>
                          @error('image4')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-12 form-group">
                      <label for="description">DESCRIPTION DE PRODUIT</label>
                      
                      <textarea id="description" type="text" class="form-control form-control-lg @error('description') is-invalid @enderror" name="description" autofocus>{{old('description')}}</textarea>

                          @error('description')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                   
                    
                  </div>
                   <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                    {{ __('AJOUTER') }}
                                </button>
                        </div>
                    </div>
           {!!Form::close()!!}
            <!-- /.card-header -->
            <div class="card-body">
              
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('footer')

@endsection