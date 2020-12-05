<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
class ContactController extends Controller
{
     public function store(ContactRequest $request,Contact $contact){
     
          $contact->create(
     	[
     	    'name'       => $request->name,       
     	    'subject'    => $request->subject,
     	    'email'      => $request->email,
     	    'message'    => $request->message,
     	    'view'       => 0,
        ]);
     
      session()->flash('success','Votre message à étè envoyer avec succeé');

      return redirect('/contact');
    }

 public function index(){
      $contact = Contact::where('deleted',0)->paginate(15);
      return view('admin.contact.index',compact('contact'));
     }
 public function message_lu(){
      $contact = Contact::where('view',1)->where('deleted',0)->paginate(15);
      return view('admin.contact.message_lu',compact('contact'));
     }
 public function message_non_lu(){
      $contact = Contact::where('view',0)->where('deleted',0)->paginate(15);
      return view('admin.contact.message_non_lu',compact('contact'));
     }
 public function message_deleted(){
      $contact = Contact::where('deleted',1)->paginate(15);
      return view('admin.contact.corbeille',compact('contact'));
     }

      public function search_message(Request $request)
      {
      $search = $request->get('search');

      $contact = Contact::where('deleted',0)->where('name','Like','%'.$search.'%')
      ->orWhere('subject','Like','%'.$search.'%')
      ->orWhere('email','Like','%'.$search.'%')
      ->paginate(15)->appends('query',$search);
      return view('admin.contact.index',compact('contact'));
     }

 public function destroy($id){
   
        $contact = Contact::find($id);
         // recupere les donnees de la bdd qui a une id=$id
        $contact->deleted = 1;
       $contact->save();
       session()->flash('success','la supression a étè faite avec succée');

 return redirect('/admin/contact');
    }


 public function delete($id){
   
        $contact = Contact::find($id); // recupere les donnees de la bdd qui a une id=$id
        $contact->delete();
       session()->flash('success','la supression est faite avec succée');

 return redirect('/admin/contact');
    }

  public function show($id,Contact $contact){
      $contact = $contact->find($id);
        
      if($contact){
         $contact->view = 1;
        $contact->save();
        return view('admin.contact.show',compact('contact'));
      }
    }

}
