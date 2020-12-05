<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Commande;
use App\Wilaya;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\CommandeRequest;
use App\Http\Requests\AppartementsRequest;
use Illuminate\Support\Facades\Auth;
use carbon\Carbon;
use PDF;
use Cart;

use Illuminate\Support\Facades\Mail;
class CommandeController extends Controller
{
     public function getcheckout(){
    	return view('user.checkout');
    }
    public function postcheckout(ClientRequest $request_client,Client $client,CommandeRequest $commande_request,Commande $commande){


	$client->fname = $request_client->input('fname');
    $client->lname = $request_client->input('lname');
    $client->email = $request_client->input('email');
    $client->num_tlfn = $request_client->input('num_tlfn');
    $client->wilaya = $request_client->input('wilaya');
    $client->commune = $request_client->input('commune');
    $client->adress = $request_client->input('adress');
    $client->code_postale = $request_client->input('code_postale');
    $client->commentaire = $request_client->input('commentaire');
	$client->save();
	$id_client = $client->id;

    	$products = Cart::Content();
foreach(Cart::content() as $product){

	 $commande->create([
	 	    
	 	      'name'        => $product->name,
              'qte' 		=> $product->qty,
              'wilaya_livraison' => $client->wilaya,
        	  'prix_total'  => Cart::subtotal(),
        	  'prix'        => $product->price,
        	  'id_product'  => $product->id,
              'id_client' 	=> $id_client,
           
        ]);

 }        	

	  $wilaya = Wilaya::where('wilaya',$client->wilaya)->first();
    $wilaya_price = $wilaya->prix;


            $data = array('fname'=>$client->fname,'lname'=>$client->lname, 'email'=>$client->email,'num_tlfn'=>$client->num_tlfn,'wilaya'=>$client->wilaya,'commune'=>$client->commune,'adress'=>$client->adress,'date_commande'=>$commande->created_at,'prix_livraison'=>$wilaya_price);
                   
        $email = $client->email;
		$lname = $client->lname;
		$fname = $client->fname;
        $pdf = PDF::loadView('user.pdf', $data);

            Mail::send('user.pdf', $data, function($message)use($email,$lname,$pdf) {
            $message->to($email, $lname)
            ->subject('devis de votre commande')
            ->attachData($pdf->output(), "devis.pdf");
            $message->from('louanes.mokhfi@gmail.com','Commande Hamiz Shop');
            });


     Cart::destroy();
 
      Session()->flash('success','Votre commande à étè passer avec succeés, vous récevez un devis de votre commande sur votre email');
    return redirect('/all-products');
    }
    

   public function all_Commande(){

    $commandes = Commande::orderBy('id','desc')->paginate(15);
   
      return view('admin.commande.index',compact('commandes'));
    
   }

    public function show_commande($id){

          $client = Client::where('id',$id)->first();

    if($client === null){
      return view('admin.layouts.error_404');
    }else{
      

      return view('admin.commande.show',compact('client'));
    }
   }

   public function effectuer($id){

           $client = Client::find($id);

           $client->effectuer = 1;
           $client->date_effectued = now();
           $client->save();
            $to_name = $client->lname;
            $to_email = $client->email;
            $data = array('name'=>$to_name, "body" => "Votre Commande a étè Valider avec succees");
 
   
Mail::send("emails.mail", $data, function($message) use ($to_name, $to_email) {
$message->to($to_email, $to_name)
->subject('Validation de la commande');
//$message->attachData($pdf->output(),'user.pdf');
$message->from('louanes.mokhfi@gmail.com','Hamiz Shop');
});
    
      
       
       
    Session()->flash('success','la commande est éffectuer');
    return redirect('/admin/commande');
   
}
}
