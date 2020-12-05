@extends('admin.layouts.app')
@section('title')
      Wilaya
@endsection

@section('header')

@endsection
@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">MODIFIER UNE WILAYA</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/wilaya')}}">Liste des wilaya</a></li>
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
              <h3 class="card-title col-md-12">MODIFIER LA WILAYA " <span style="color: red">{{$wilaya->wilaya}}"</span></h3>
             </div>
           {!!Form::open(['url' => '/admin/wilaya/'.$wilaya->id ,'method' => 'put'])!!}
                  <div class="row">
                    <input type="hidden" name="id" value="{{$wilaya->id}}">
                    <div class="col-md-8 form-group">
                      <label for="wilaya">WILAYA</label>
                      <input id="wilaya" type="text" class="form-control form-control-lg @error('wilaya') is-invalid @enderror" name="wilaya" value="{{ $wilaya->wilaya }}" required autocomplete="wilaya" autofocus>

                          @error('wilaya')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="prix">PRIX DE LIVRAISON (DA)</label>
                      <input id="prix" type="text" class="form-control form-control-lg @error('prix') is-invalid @enderror" name="prix" value="{{ $wilaya->prix }}" required autocomplete="prix" autofocus>

                          @error('prix')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-12 form-group">
                      <label for="active">ETAT</label>
                      <input id="switcheryColor4" type="checkbox" class="switchery" data-color="success" @if( $wilaya->active == '1' ) checked @endif name="active" value="1">

                          @error("active")
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