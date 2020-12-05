@extends('admin.layouts.app')
@section('title')
      afficher un message
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
  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Affiche une Message</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'/admin'}}">Accueil</a></li>
              <li class="breadcrumb-item active">Affiche une Message</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dossier</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
       <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active" id="all_msg">
                  <a href="{{url('/admin/contact')}}" class="nav-link" >
                    <i class="fas fa-inbox"></i> Boit de réception
                    <span class="badge bg-primary float-right">{{count(allmessage())}}</span>
                  </a>
                </li>
                <li class="nav-item" id="read_msg">
                  <a href="{{url('/admin/contact/message_lu')}}" class="nav-link" >
                    <i class="far fa-file-alt"></i> Message Lu
                    <span class="badge bg-warning float-right">{{countreadMessage()}}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/contact/message_non_lu')}}" class="nav-link" id="unread_msg">
                    <i class="fas fa-filter"></i> Message Non Lu
                    <span class="badge bg-warning float-right">{{countunreadMessage()}}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/contact/corbeille')}}" class="nav-link" id="deleted_msg">
                    <i class="far fa-trash-alt"></i> Corbeille
                    <span class="badge bg-danger float-right">{{count(deleted_message())}}</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      
 <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Lire le message</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>{{ $contact->name }}</h5>
                <h6>de: {{ $contact->email }}
                  <span class="mailbox-read-time float-right">{{$contact->created_at}}</span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <a href="{{ url('/admin/contact/'.$contact->id.'/delete')}}" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="far fa-trash-alt"></i></a>
                </div>
                <!-- /.btn-group -->
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                 @if($contact->type != null)
                <p class="text-sm" style="color: red">Type : {{$contact->type}}</p>
                @else
                <p class="text-sm" style="color: red">Type: Message</p>
                @endif
                <p><b>Objet: </b>{{$contact->subject}}</p>

                <p>{{$contact->message}}</p>

              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white">
              
            </div>

            <div class="card-footer">
              <div class="float-right">


            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    

@endsection

@section('footer')

@endsection