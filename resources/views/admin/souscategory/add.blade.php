@extends('admin.layouts.app')
@section('title')
      Catégorie
@endsection

@section('header')

@endsection
@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">AJOUTER UNE SOUS CATEGORIE</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/sous-category')}}">Liste des sous categories</a></li>
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
              <h3 class="card-title col-md-12">AJOUTER UNE SOUS CATEGORIE</h3>
             </div>
           {!!Form::open(['url' => '/admin/sous-category' ,'method' => 'post','enctype'=>'multipart/form-data'])!!}
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="sous_category">SOUS CATEGORIE</label>
                      <input id="sous_category" type="text" class="form-control form-control-lg @error('sous_category') is-invalid @enderror" name="sous_category" value="{{ old('sous_category') }}" required autocomplete="sous_category" autofocus>

                          @error('sous_category')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="id_category">CATEGORIE</label>
                      <select id="id_category" class="form-control form-control-lg @error('id_category') is-invalid @enderror" name="id_category" value="{{ old('id_category') }}" required autocomplete="id_category" autofocus>
                        <option value="">-- Categorie --</option>
                        @foreach(All_Category() as $cat)
                          <option value="{{$cat->id}}">{{$cat->category}}</option>
                        <@endforeach
                      </select>
                          @error('id_category')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                     <div class="col-md-12 form-group">
                      <label for="image">IMAGE</label>
                     <input type="file" name="image" class="form-control form-control-lg @error('image') is-invalid @enderror">
                          @error('image')
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