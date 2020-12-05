<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Product;
//use App\MAil\SenMail;
use Illuminate\Support\Facades\Mail;
class AdminController extends Controller
{
   public function home(){
      return view('admin.index');
   }

	 public function index(){
    $id = Auth::user()->id;
    if($id == 1){
        $user = User::where('is_admin',1)->where('deleted',0)->paginate(15);//where('active',1)->get();
              return view('admin.admin.index',compact('user'));

      }else{
         return view('admin.layouts.error_404');
      }
   }

    public function search_admin_index(Request $request){
      $name = $request->get('name');
      $user = User::where('is_admin',1)->where('deleted',0)->where('name','Like','%'.$name."%")->paginate(15)->appends('user',$name);
      return view('admin.admin.index',compact('user'));
  }

   public function create(){

    return view('admin.admin.add');
   }

   
   public function store(Request $request,User $user){
      $user->create([
            'name'  => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'password' => bcrypt($request->password),
        ]);
      session()->flash('success',"L'administrateur' est ajouter avec succée");

 return redirect('/admin/admin');
   }
    public function edit($id){
     $user = User::find($id);
      if($user === null){
      return view('layouts.error_404');
    }else{
     return view('admin.admin.edit',compact('user'));
   }
 }
    public function update($id,Request $request){

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');
        $user->password = bcrypt($request->input('password'));

        $user->save();
          
         session()->flash('success',"L'administrateur est modifier avec succée");

 return redirect('/admin/admin');
   }
    public function destroy($id){
    if($id != 1){
        $user = User::find($id); // recupere les donnees de la bdd qui a une id=$id
        //$user->delete();
          //$user = User::find($id);
          $user->deleted = 1;
          $user->save();
        
         session()->flash('success','Le membre est supprimer avec succée');

 return redirect('/admin/admin');
    }else{
         session()->flash('warning','vous ne peuvent pas supprimer ce membre');

 return redirect('/admin/admin');
      //  return redirect('/admin/users')->withFlashMessage('');
    }
  }

    public function show($id){

     $user = User::find($id);
     if($user === null){
      return view('layouts.error_404');
    }else{
     return view('admin.admin.show',compact('user'));
   }
   }

   public function profil(){
    return view('admin.my-account');
   }  
    public function Confirmer($id){
           $agence = User::find($id);
           $agence->confirmation_admin = 1;
           $agence->admin = 1;
           $agence->save();
            $to_name = $agence->name;
            $to_email = $agence->email;
            $data = array('name'=>$to_name, "body" => "Votre inscription dans la plateform QuickShop est confirmer,vous peuvez accéder à votre espace admin de location, http://localhost:8000/login");
Mail::send("emails.mail", $data, function($message) use ($to_name, $to_email) {
$message->to($to_email, $to_name)
->subject('INSCRIPTION QuickShop');
$message->from('louanes.mokhfi@gmail.com','Inscription QuickShop');
});
           Session()->flash('success','la demande de L\'agence a étè Confirmer avec succée');
          return redirect('admin/demande');
    }

    public function rejeter($id){
           $agence = User::find($id);
           $agence->confirmation_admin = 0;
           $agence->deleted = 1;
           $agence->save();

           $to_name = $agence->name;
            $to_email = $agence->email;
            $data = array('name'=>$to_name, "body" => "Votre inscription dans la plateform QuickShop est rejeter, vous étès obliger de refaire l'inscription avec votre propres informations, http://localhost:8000/register");
Mail::send("emails.mail", $data, function($message) use ($to_name, $to_email) {
$message->to($to_email, $to_name)
->subject('INSCRIPTION QuickShop');
$message->from('louanes.mokhfi@gmail.com','Inscription QuickShop');
});
           Session()->flash('success','la demande de L\'agence a étè rejeter');
          return redirect('admin/demande');
    }
    //


     public function confirmation_product($id){

      if(Auth::user()->id == 1){
         $product = Product::find($id); // recupere les donnees de la bdd qui a une id=$id
 
          $product->confirmation_admin = 1;
          $product->save();
        
         session()->flash('success','La confirmation de produit a étè faite avec succees');

 return redirect('/admin/product');
      }
       else {
         session()->flash('error','Vous n\'avait pas le droit de confirmer ce produit');

 return redirect('/admin/product-not-confirmed');
      }
       }
        
  
  
}
