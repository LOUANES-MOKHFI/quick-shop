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
              <h3 class="card-title col-md-2">Liste des sous categories</h3>
              <form class="card card-sm col-md-7" action="{{url('/admin/search_sous-category')}}" method="get">
        {{ csrf_field()}}
         <div class=" row no-gutters align-items-center">
             <div class="col-md-10 col-sm-12">
                 <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Categorie.." name="souscategory">
             </div>
                                    <!--end of col-->
            <div class="col-md-2 col-sm-12">
                 <button class="btn btn-lg btn-info" type="submit" name="search">Rechercher</button>
             </div>
                                    <!--end of col-->
         </div>
     </form>
             <div class="col-md-3 col-sm-12">
                <a href="{{url('/admin/sous-category/create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>Ajouter une sous categorie</a>
             </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>PHOTO</th>
                  <th width="200">SOUS CATEGORIES</th>
                  <th width="200">CATEGORIES</th>
                  <th width="200">ACTION</th>
                </tr>
                </thead>
                <tbody>
                	@if(count($souscategory) == 0)
                        <tr>
                        	<td colspan="3" style="color: red;font-weight: bold" align="center">LA LISTE DES SOUS CATEGORY EST VIDE</td>
                        </tr>
                	@else
                  @foreach($souscategory as $sous_cat)
                  
                <tr>
                  <td width="120"><img style="height: 100px;width: 120px" src="{{asset('/souscategory/'.$sous_cat->image)}}"></td>
                  <td>{{$sous_cat->souscategory}}</td>
                  <td>{{$sous_cat->mainCategory->category}}</td>
                  
                  <td>
                    <a class="btn btn-info fa  fa-eye-slash" href="{{'/admin/sous-category/'.$sous_cat->id}}"></a>
                    <a class="btn btn-warning fa fa-btn fa-edit" href="{{'/admin/sous-category/'.$sous_cat->id.'/edit'}}"></a>
                        {{ csrf_field()}}
                        {{ method_field('DELETE') }}
                        <a class="btn btn-danger far fa-trash-alt" href="{{'/admin/sous-category/'.$sous_cat->id.'/delete'}}"></a>
                  </td>
                </tr>
          
                 @endforeach
                 @endif
                </tbody>
                <tfoot>
                <tr>
                  <th>PHOTO</th>
                  <th width="300">SOUS CATEGORIES</th>
                  <th width="300">CATEGORIES</th>
                  <th width="100">ACTION</th>
                </tr>
                </tfoot>
              </table>
            </div>
            {{$souscategory->links()}}
          </div>
        </div>
      </div>
    </section>
@endsection
@section('footer')

@endsection