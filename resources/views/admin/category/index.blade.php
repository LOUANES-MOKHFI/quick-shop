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
            <h1 class="m-0 text-dark">Liste des categories</h1>
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
              <h3 class="card-title col-md-2">Liste des categories</h3>
              <form class="card card-sm col-md-7" action="{{url('/admin/search_category')}}" method="get">
        {{ csrf_field()}}
         <div class=" row no-gutters align-items-center">
             <div class="col-md-10 col-sm-12">
                 <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Categorie.." name="category">
             </div>
                                    <!--end of col-->
            <div class="col-md-2 col-sm-12">
                 <button class="btn btn-lg btn-info" type="submit" name="search">Rechercher</button>
             </div>
                                    <!--end of col-->
         </div>
     </form>
             <div class="col-md-3 col-sm-12">
                <a href="{{url('/admin/category/create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>Ajouter une categorie</a>
             </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th width="600">CATEGORIES</th>
                  <th width="100">ACTION</th>
                </tr>
                </thead>
                <tbody>
                	@if(count($category) == 0)
                        <tr>
                        	<td colspan="2" style="color: red;font-weight: bold" align="center">LA LISTE DES CATEGORY EST VIDE</td>
                        </tr>
                	@else
                  @foreach($category as $cat)
                  
                <tr>
                  <td>{{$cat->category}}</td>
                  
                  <td>
                    @if($cat->id_user == Auth::user()->id)
                    <a class="btn btn-warning fa fa-btn fa-edit" href="{{'/admin/category/'.$cat->id.'/edit'}}"></a>
                        {{ csrf_field()}}
                        {{ method_field('DELETE') }}
                        <a class="btn btn-danger far fa-trash-alt" href="{{'/admin/category/'.$cat->id.'/delete'}}"></a>
                        @endif
                  </td>
                </tr>
          
                 @endforeach
                 @endif
                </tbody>
                <tfoot>
                <tr>
                  <th>CATEGORIES</th>
                  <th>ACTION</th>
                </tr>
                </tfoot>
              </table>
            </div>
            {{$category->links()}}
          </div>
        </div>
      </div>
    </section>
@endsection
@section('footer')

@endsection