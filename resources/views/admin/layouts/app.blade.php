<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{getsetting()->site_name}} - @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="">
  <!-- Ionicons -->
    <link rel="shortcut icon" href="{{asset('/images/'.getsetting()->logo)}}" type="image/x-icon" />

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  {!!Html::style('/designe/plugins/fontawesome-free/css/all.min.css')!!}
  {!!Html::style('/designe/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')!!}
  {!!Html::style('/designe/plugins/icheck-bootstrap/icheck-bootstrap.min.css')!!}
  {!!Html::style('/designe/plugins/jqvmap/jqvmap.min.css')!!}
  {!!Html::style('/designe/dist/css/adminlte.min.css')!!}
  {!!Html::style('/designe/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')!!}
  {!!Html::style('/designe/plugins/daterangepicker/daterangepicker.css')!!}
  {!!Html::style('/designe/plugins/summernote/summernote-bs4.css')!!}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @yield('header')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/admin')}}" class="nav-link">Accueil</a>
      </li>
       <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/profil')}}" class="nav-link">Profil</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       
      @if(Auth::user()->id == 1)
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">{{ countunreadMessage() }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           <span class="dropdown-item dropdown-header">{{ countunreadMessage() }} Messages</span>
            <div class="dropdown-divider"></div>
            @foreach(unreadMessage() as $keyMessage => $valueMessage)
          <a href="{{ url('/admin/contact/'.$valueMessage->id) }}" class="dropdown-item">
            <!-- Message Start -->
             
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{$valueMessage->name}}
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">{{ Str_limit($valueMessage->message,30)}}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{date_format($valueMessage->created_at,'Y-M-d | H:i')}}</p>
              </div>
            </div>
          
            <!-- Message End -->
          </a> 
          <div class="dropdown-divider"></div>
             @endforeach
         
          <a href="{{url('/admin/contact') }}" class="dropdown-item dropdown-footer">Afficher tout les messages</a>
        </div>
      </li>


   <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">{{ count(unreadCommande()) }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           <span class="dropdown-item dropdown-header">{{ count(unreadCommande()) }} Commandes</span>
            <div class="dropdown-divider"></div>
            @foreach(unreadCommande() as $keyMessage => $valueMessage)
          <a href="{{ url('/admin/commande/'.$valueMessage->id) }}" class="dropdown-item">
            <!-- Message Start -->
             
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 <span style="color: red"> Wilaya :</span>{{ $valueMessage->wilaya }}
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">{{ Str_limit($valueMessage->prix_total,30)}}</p>
                
              </div>
            </div>
          
            <!-- Message End -->
          </a> 
          <div class="dropdown-divider"></div>
             @endforeach
         
          <a href="{{url('/admin/commande') }}" class="dropdown-item dropdown-footer">Afficher tout les commandes</a>
        </div>
      </li>
      @endif
      <!-- Notifications Dropdown Menu -->
 
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             {{ Auth::user()->name }} <span class="caret"></span>
         </a>

         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
 @include('admin.layouts.nav')
  <!-- Main Sidebar Container -->
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('admin.layouts.flash_msg')
    <!-- /.content-header -->

    <!-- Main content -->
   @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script></strong>
     Tout droits réservés
    <div class="float-right d-none d-sm-inline-block">
      <b>{{getsetting()->site_name}}</b>
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>

{!!Html::script('/designe/plugins/jquery/jquery.min.js')!!}
{!!Html::script('/designe/plugins/jquery-ui/jquery-ui.min.js')!!}
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
{!!Html::script('/designe/plugins/bootstrap/js/bootstrap.bundle.min.js')!!}
{!!Html::script('/designe/plugins/chart.js/Chart.min.js')!!}
{!!Html::script('/designe/plugins/sparklines/sparkline.js')!!}
{!!Html::script('/designe/plugins/jqvmap/jquery.vmap.min.js')!!}
{!!Html::script('/designe/plugins/jqvmap/maps/jquery.vmap.usa.js')!!}
{!!Html::script('/designe/plugins/jquery-knob/jquery.knob.min.js')!!}
{!!Html::script('/designe/plugins/moment/moment.min.js')!!}
{!!Html::script('/designe/plugins/daterangepicker/daterangepicker.js')!!}
{!!Html::script('/designe/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')!!}
{!!Html::script('/designe/plugins/summernote/summernote-bs4.min.js')!!}
{!!Html::script('/designe/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')!!}
{!!Html::script('/designe/dist/js/adminlte.js')!!}
{!!Html::script('/designe/dist/js/pages/dashboard.js')!!}
{!!Html::script('/designe/dist/js/demo.js')!!}

@yield('footer')
</html>
