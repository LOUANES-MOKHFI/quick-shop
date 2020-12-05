@extends('admin.layouts.app')
@section('title')
      Les commandes
@endsection

@section('header')

@endsection
@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des commandes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/commande')}}">Liste des commandes</a></li>
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
              <h3 class="card-title col-md-2">Liste des commandes</h3>
            </div>
              <h2></h2>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 
                <tr>
                  <th width="150">DATE DE COMMANDE</th>
                  <th width="150">NOM DE CLIENT</th>
                  <th width="150">WILAYA</th>
                  <th width="100">ACTION</th>
                </tr>
                </thead>
                <tbody>
                	
                  @foreach(All_Commande() as $client)
                  
                <tr>
                  <td>{{$client->created_at}}</td>
                  <td>{{$client->fname}}-{{$client->lname}}</td>
                  <td>{{$client->wilaya}}</td>
                  <td>
                    <a class="btn btn-info fa  fa-eye-slash" href="{{'/admin/commande/'.$client->id}}"></a>
                   
                  </td>
                </tr>
          
                 @endforeach
              
                </tbody>
                <tfoot>
                  <tr>
                  <th width="150">DATE DE COMMANDE</th>
                  <th width="150">NOM DE CLIENT</th>
                  <th width="150">WILAYA</th>
                  <th width="100">ACTION</th>
                </tr>
                </tfoot>
              </table>
            </div>
            {{All_Commande()->links()}}
          </div>
        </div>
      </div>
    </section>
@endsection
@section('footer')

@endsection