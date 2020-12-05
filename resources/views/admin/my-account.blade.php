@extends('admin.layouts.app')
@section('title')
      Mon Profil
@endsection

@section('header')
<style type="text/css">
 .body{
    margin-top:20px;
    background:#F0F8FF;
}
.card {
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e5e9f2;
    border-radius: .2rem;
}
.card-header:first-child {
    border-radius: calc(.2rem - 1px) calc(.2rem - 1px) 0 0;
}
.card-header {
    border-bottom-width: 1px;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    color: inherit;
    background-color: #fff;
    border-bottom: 1px solid #e5e9f2;
}
.btn-primary{
   color: #fff !important;
 background-color: #007bff;
}
</style>
@endsection
@section('content')

    <div class="custom-breadcrumns border-bottom" style="margin-top: 70px">
      <div class="container div">
        <a href="#">Accueil</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Mon profil</span>
      </div>
    </div>
<div class="body"><div class="container p-0">

    <h1 class="h3 mb-3">Parametres</h1>

    <div class="row">
        <div class="col-md-5 col-xl-4">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">parametres de Profile</h5>
                </div>

                <div class="list-group list-group-flush" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                      Compte
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                      Mot de passe
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-7 col-xl-8">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="account" role="tabpanel">
                 
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Email</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/update-email')}}" method="post">
                                   {{ csrf_field()}}
                                   @method('PUT')
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{Auth::user()->email}}" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <img alt="Andrew Jones" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Information personnelles</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/update-information')}}" method="post">
                                 {{ csrf_field()}}
                        @method('PUT')

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputFirstName">Nom Et Prénom</label>
                                        <input type="text" class="form-control" id="inputFirstName" placeholder="Nom Et Prénom" name="name" value="{{Auth::user()->name}}" required="">
                                    </div>
                                </div>
                               
                              
                                <button type="submit" class="btn btn-primary">Enregistre</button>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="password" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mot de passe</h5>

                            <form action="{{'/update-password'}}" method="post">
                                 {{ csrf_field()}}
                        @method('PUT')

                                <div class="form-group">
                                    <label for="inputPasswordNew">nouveau mot de passe</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  id="inputPasswordNew" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


@endsection
@section('footer')

@endsection