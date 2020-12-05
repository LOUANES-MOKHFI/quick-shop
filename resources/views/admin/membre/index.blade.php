@extends('admin.layouts.app')

@section('title')
    Liste Des Membres
@endsection

@section('header')
{!! Html::style('/designe/plugins/fontawesome-free/css/all.min.css') !!}
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
{!! Html::style('/designe/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}
{!! Html::style('/designe/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}
{!! Html::style('/designe/dist/css/adminlte.min.css') !!}
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Liste des Membres</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'/admin'}}">Accueil</a></li>
              <li class="breadcrumb-item active">Liste des Membres</li>
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
             <div class="card-header row">
              <h3 class="card-title col-md-2 col-sm-6">Liste des Membres</h3>
              <form class="card card-sm col-md-7 col-sm-6" action="{{url('/search-membre')}}" method="get">
        {{ csrf_field()}}
         <div class=" row no-gutters align-items-center">
             <div class="col">
                 <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Nom de membre.." name="name">
             </div>
                                    <!--end of col-->
            <div class="col-auto">
                 <button class="btn btn-lg btn-info" type="submit" name="search">Rechercher</button>
             </div>
                                    <!--end of col-->
         </div>
     </form>
             <div class="col-md-3 col-sm-6">
                <a href="{{url('/admin/membre/create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>Ajouter un membre</a>
             </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom et Prenom</th>
                  <th>Email</th>
                  <th>Grade</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($user) == 0)
                  <tr>
                    <td colspan="4" style="color: red;font-weight: bold" align="center"> LA LISTE DES MEMBRE EST VIDE</td>
                  </tr>
                  @else
                  @foreach($user as $user1)
                  
                <tr>
                  <td>{{$user1->name}}</td>
                  <td>{{$user1->email}}</td>
                  <td>{{$user1->is_admin = 0 ? 'Admin' : 'Membre' }}</td>
                  <td>
                    <a class="btn btn-info fa fa-eye-slash" href="{{'/admin/membre/'.$user1->id}}"></a>
                    <a class="btn btn-warning fa fa-btn fa-edit" href="{{'/admin/membre/'.$user1->id.'/edit'}}"></a>
                        {{ csrf_field()}}
                        {{ method_field('DELETE') }}
                       @if($user1->id != 1)
                        <a class="btn btn-danger far fa-trash-alt" href="{{'/admin/membre/'.$user1->id.'/delete'}}"></a>
                       @endif 
                  </td>
                </tr>
          
                 @endforeach
                 @endif
                </tbody>
                <tfoot>
                <tr>
                  <th>Nom et Prenom</th>
                  <th>Email</th>
                  <th>Grade</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            {{$user->links()}}
          </div>
        </div>
      </div>
    </section>
@endsection

@section('footer')


@endsection