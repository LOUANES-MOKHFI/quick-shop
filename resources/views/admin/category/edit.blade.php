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
            <h1 class="m-0 text-dark">MODIFIER UNE CATEGORIE</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/category')}}">Liste des categories</a></li>
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
              <h3 class="card-title col-md-12">MODIFIER LA CATEGORIE " <span style="color: red">{{$category->category}}"</span></h3>
             </div>
           {!!Form::open(['url' => '/admin/category/'.$category->id ,'method' => 'put'])!!}
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="category">CATEGORIE</label>
                      <input id="category" type="text" class="form-control form-control-lg @error('category') is-invalid @enderror" name="category" value="{{ $category->category }}" required autocomplete="category" autofocus>

                          @error('category')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                  </div>
                   <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                    {{ __('MODIFIER') }}
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