@extends('admin.layouts.app')
@section('title')
      Message Lu
@endsection

@section('header')
  {!! Html::style('designe/dist/css/skins/_all-skins.min.css') !!}
  {!! Html::style('designe/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection
@section('content')
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des messages non lu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Liste des messages non lu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

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
        <div class="col-md-9 a" id="tout_msg">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Message non Lu</h3>

              <div class="card-tools">
                
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <div class="float-right">
                  
                  <div class="btn-group">
                   {{$contact->links()}}
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach($contact as $message)
                  <tr>
                    <td class="mailbox-name"><a href="{{'/admin/contact/'.$message->id}}">{{$message->name}}</a></td>
                    <td class="mailbox-subject"><b>{{$message->subject}}</b> - {{str_limit($message->message)}}
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{$message->created_at}}</td>
                    <td><a href="{{'/admin/contact/'.$message->id.'/delete'}}" class=" btn far fa-trash-alt"></a></td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                </div>
                <!-- /.btn-group -->
                <div class="float-right">
                  <div class="btn-group">
                    {{$contact->links()}}
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection
@section('footer')

@endsection