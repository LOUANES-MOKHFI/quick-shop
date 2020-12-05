@extends('admin.layouts.app')
@section('title')
    NewsLetter
@endsection

@section('header')

@endsection
@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des NewsLetter</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/sous-category')}}">Liste des NewsLetter</a></li>
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
              <h3 class="card-title col-md-2">Liste des NewsLetter</h3>
              
            <a href="{{url('/export_newsletter-excel')}}" class="btn btn-success">Export vers excel</a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="300">ID</th>
                  <th width="300">EMAIL</th>
                  <th width="100">STATUS</th>
                  <th>AJOUTER LE</th>
                </tr>
                </thead>
                <tbody>
                	@if(count($newsletters) == 0)
                        <tr>
                        	<td colspan="3" style="color: red;font-weight: bold" align="center">LA LISTE DES NEWSLETTERS EST VIDE</td>
                        </tr>
                	@else
                  @foreach($newsletters as $newsletter)
                  
                <tr>
                  <td>{{$newsletter->id}}</td>
                  <td>{{$newsletter->email}}</td>
                  <td>{{$newsletter->status == 1 ? 'active' : 'desactive'}}</td>
                  <td>{{$newsletter->created_at}}</td>
                </tr>
          
                 @endforeach
                 @endif
                </tbody>
                <tfoot>
                <tr>
                  <th width="300">ID</th>
                  <th width="300">EMAIL</th>
                  <th width="100">STATUS</th>
                  <th>AJOUTER LE</th>
                </tr>
                </tfoot>
              </table>
            </div>
            {{$newsletters->links()}}
          </div>
        </div>
      </div>
    </section>
@endsection
@section('footer')

@endsection