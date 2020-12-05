@extends('admin.layouts.app')

@section('title')
    Afficher Un membre
@endsection

@section('header')
    
@endsection

@section('content')
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Afficher Un membre</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'/admin'}}">Accueil</a></li>
              <li class="breadcrumb-item active">Afficher Un membre</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
  <div class="row">
    <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Afficher Le membre <b>{{$user->name}}</b></h3>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <h4>Nom de :</h4>{{$user->name}}
              </div>
              <div class="col-md-6 col-lg-6">
               <h4>Email :</h4>{{$user->email}} 
                <h4>Grade :</h4>{{$user->is_admin = 1 ? 'Admin' : 'Membre' }}
                </div>
            </div>
    </div>
  </div>
</div>
</section>

@endsection

@section('footer')
    
@endsection
