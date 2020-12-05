@extends('admin.layouts.app')

@section('title')
  Modifier Un Administrateur
@endsection

@section('header')
    
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modifier Un Administrateur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'/admin'}}">Accueil</a></li>
              <li class="breadcrumb-item active">Modifier Un Administrateur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Modifier L'administrateur <b>{{$user->name}}</b></h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ url('admin/admin/'.$user->id) }}">
                        {{ csrf_field()}}
                        @method('PUT')

                <div class="">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="username">Nom et Prénom</label>
                            <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ 
                            	$user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="pword">Mot de pass</label>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="pword2">Confirmer votre mot de passe</label>
                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                        </div>
                     </div>
                        

                         <div class="col-md-12 form-group b">
                            <label for="is_admin">GRADE<span style="color: red"> *</span></label>
                          
                             <select name="is_admin" class="form-control form-control-lg @error('is_admin') is-invalid @enderror" required >
                             <option value="">-- GRADE --</option>
                             <option value="1">Admin</option>
                             <option value="0">Membre</option>
                          </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning fa fa-btn fa-edit btn-lg px-5">
                                    {{ __('Modifier') }}
                                </button>
                        </div>
                    </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('footer')
           
@endsection