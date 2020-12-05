@extends('admin.layouts.app')
@section('title')
      Wilayas
@endsection

@section('header')

@endsection
@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des Wilayas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/wilaya')}}">Liste des Wilayas</a></li>
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
              <h3 class="card-title col-md-2">Liste des Wilayas</h3>
              <form class="card card-sm col-md-7" action="{{url('/admin/search_wilaya')}}" method="get">
        {{ csrf_field()}}
         <div class=" row no-gutters align-items-center">
             <div class="col-md-10 col-sm-12">
                 <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Wilaya.." name="Wilaya">
             </div>
                                    <!--end of col-->
            <div class="col-md-2 col-sm-12">
                 <button class="btn btn-lg btn-info" type="submit" name="search">Rechercher</button>
             </div>
                                    <!--end of col-->
         </div>
     </form>
             <div class="col-md-3 col-sm-12">
                <a href="{{url('/admin/wilaya/create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>Ajouter une Wilaya</a>
             </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="200">WILAYA</th>
                  <th width="200">PRIX</th>
                  <th width="200">ETAT</th>
                  <th width="100">ACTION</th>
                </tr>
                </thead>
                <tbody>
                	@if(count($wilayas) == 0)
                        <tr>
                        	<td colspan="4" style="color: red;font-weight: bold" align="center">LA LISTE DES WIALAYAS EST VIDE</td>
                        </tr>
                	@else
                  @foreach($wilayas as $wilaya)
                  
                <tr>
                  <td>{{$wilaya->wilaya}}</td>
                  <td>{{$wilaya->prix}}</td>
                  <td>{{$wilaya->getActive()}}</td>
                  
                  <td>
                    <a class="btn btn-warning fa fa-btn fa-edit" href="{{'/admin/wilaya/'.$wilaya->id.'/edit'}}"></a>
                        {{ csrf_field()}}
                        {{ method_field('DELETE') }}
                        <a class="btn btn-danger far fa-trash-alt" href="{{'/admin/wilaya/'.$wilaya->id.'/delete'}}"></a>
                  </td>
                </tr>
          
                 @endforeach
                 @endif
                </tbody>
                <tfoot>
                <tr>
                  <th>WILAYA</th>
                  <th>PRIX</th>
                  <th>ETAT</th>
                  <th>ACTION</th>
                </tr>
                </tfoot>
              </table>
            </div>
            {{$wilayas->links()}}
          </div>
        </div>
      </div>
    </section>
@endsection
@section('footer')

@endsection