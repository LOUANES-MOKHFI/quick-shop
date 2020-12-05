<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class MembreController extends Controller
{
     public function index(){
        $user = User::where('is_admin',0)->where('deleted',0)->paginate(15);//where('active',1)->get();
      return view('admin.membre.index',compact('user'));
   }

    public function search_membre_index(Request $request){
      $name = $request->get('name');
      $user = User::where('is_admin',0)->where('deleted',0)->where('name','Like','%'.$name."%")->paginate(15)->appends('user',$name);
      return view('admin.membre.index',compact('user'));
  }

   public function create(){

    return view('admin.membre.add');
   }

   
   public function store(Request $request,User $user){
   	dd($request->all());
      $user->create([
            'name'  => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'password' => bcrypt($request->password),
        ]);
      session()->flash('success',"Le membre est ajouter avec succée");

 return redirect('/admin/membre');
   }
    public function edit($id){
     $user = User::find($id);
      if($user === null){
      return view('layouts.error_404');
    }else{
     return view('admin.membre.edit',compact('user'));
   }
 }
    public function update($id,Request $request){

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');
        $user->password = bcrypt($request->input('password'));

        $user->save();
          
         session()->flash('success',"Le membre est modifier avec succée");

 return redirect('/admin/membre');
   }
    public function destroy($id){
    if($id != 1){
        $user = User::find($id); // recupere les donnees de la bdd qui a une id=$id
        //$user->delete();
          //$user = User::find($id);
            $user->deleted = 1;
          $user->save();
        
         session()->flash('success','Le membre est supprimer avec succée');

 return redirect('/admin/membre');
    }else{
         session()->flash('warning','vous ne peuvent pas supprimer ce membre');

 return redirect('/admin/membre');
      //  return redirect('/admin/users')->withFlashMessage('');
    }
  }

    public function show($id){

     $user = User::find($id);
     if($user === null){
      return view('layouts.error_404');
    }else{
     return view('admin.membre.show',compact('user'));
   }
   }

   public function profil(){
    return view('user.my-account');
   }
}
